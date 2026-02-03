<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Log;

class RazorpayController extends Controller
{
    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    /**
     * Create Razorpay Order (called from frontend)
     */
    public function createRazorpayOrder(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $amountInPaise = round($request->amount * 100); // rupees → paise

        try {
            $order = $this->razorpay->order->create([
                'amount'   => $amountInPaise,
                'currency' => 'INR',
                'receipt'  => 'rcpt_' . Str::random(12) . '_' . time(),
            ]);

            return response()->json([
                'razorpay_order_id' => $order['id'],
                'amount' => $amountInPaise, // optional: frontend को वापस भेज सकते हो match के लिए
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify Payment + Create Order (main method)
     */
    public function verifyRazorpayPayment(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id'   => 'required|string',
            'razorpay_signature'  => 'required|string',
            'formData'            => 'required|array',
        ]);

        $attributes = [
            'razorpay_order_id'   => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature'  => $request->razorpay_signature,
        ];

        try {
            // Recommended: SDK से verify (throws exception अगर fail)
            $this->razorpay->utility->verifyPaymentSignature($attributes);
        } catch (SignatureVerificationError $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid signature: Payment tampered'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Verification failed: ' . $e->getMessage()
            ], 500);
        }

        // Signature valid → proceed
        $data = $request->formData;
        $userId = Auth::id();

        // Cart items fetch (तुम्हारा logic same रखा)
        $cartItems = DB::table('addtocart')
            ->join('products', 'addtocart.p_id', '=', 'products.p_id')
            ->join('color', 'addtocart.color_id', '=', 'color.color_id')
            ->join('sizes', function ($join) {
                $join->on('addtocart.size_id', '=', 'sizes.size_id')
                     ->on('color.color_id', '=', 'sizes.size_color_id');
            })
            ->where('addtocart.user_id', $userId)
            ->select(
                'addtocart.p_id',
                'addtocart.color_id',
                'addtocart.p_quantity',
                'products.p_name',
                'products.p_price',
                'sizes.size_name',
                'sizes.size_price_adjustment',
                DB::raw('
                    (
                        (products.p_price
                        + COALESCE(sizes.size_price_adjustment,0)
                        + COALESCE(color.color_price_adjustment,0))
                        * addtocart.p_quantity
                    ) as item_total
                ')
            )
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Cart is empty'], 400);
        }

        $subtotal = (float) $cartItems->sum('item_total');
        $shipping = (float) ($data['shipping_charge'] ?? 0);
        $grandTotal = round($subtotal + $shipping, 2);

        // Order insert
        $orderId = DB::table('tbl_orders')->insertGetId([
            'o_user_id'        => $userId,
            'o_order_number'   => 'ORD-' . Str::random(8) . '-' . time(),
            'o_email'          => $data['email'] ?? Auth::user()->email,
            'o_name'           => $data['name'] ?? Auth::user()->name,
            'o_phone'          => $data['phone'] ?? '',
            'o_order_notes'    => $data['o_order_notes'] ?? null,
            'o_street_address' => $data['address'] ?? '',
            'o_city'           => $data['city'] ?? '',
            'o_state'          => $data['state'] ?? null,
            'o_postcode'       => $data['postcode'] ?? '',
            'o_subtotal'       => $subtotal,
            'o_shipping_cost'  => $shipping,
            'o_total_amount'   => $grandTotal,
            'o_payment_method' => 'online',
           'o_payment_status' => 'pending',
            'o_order_status'   => 'pending',
            'o_razorpay_order_id'   => $request->razorpay_order_id,
            'o_razorpay_payment_id' => $request->razorpay_payment_id,
            'o_razorpay_signature'  => $request->razorpay_signature,
            'o_latitude'       => $data['latitude'] ?? null,
            'o_longitude'      => $data['longitude'] ?? null,
            'o_created_at'     => now(),
            'o_updated_at'     => now(),
        ]);

        // Order items
        foreach ($cartItems as $item) {
            DB::table('tbl_order_items')->insert([
                'o_i_order_id'      => $orderId,
                'o_i_product_id'    => $item->p_id,
                'o_i_color_id'      => $item->color_id,
                'o_i_product_name'  => $item->p_name,
                'o_i_quantity'      => $item->p_quantity,
                'o_i_size'          => $item->size_name,
                'o_i_size_price'    => $item->size_price_adjustment ?? 0,
                'o_i_product_price' => $item->p_price,
                'o_i_total_price'   => $item->item_total,
                'o_i_created_at'    => now(),
                'o_i_updated_at'    => now(),
            ]);
        }

        // Clear cart
        DB::table('addtocart')->where('user_id', $userId)->delete();

        return response()->json([
            'success'  => true,
            'order_id' => $orderId,
            'message'  => 'Payment verified & order placed successfully'
        ]);
    }

    // webhook controller started--------------->
   

public function webhook(Request $request)
{
    $payload = $request->getContent();
    $signature = $request->header('X-Razorpay-Signature');
    $secret = env('RAZORPAY_WEBHOOK_SECRET');

    // Verify signature
    $expectedSignature = hash_hmac('sha256', $payload, $secret);

    if (!hash_equals($expectedSignature, $signature)) {
        Log::error('Razorpay Webhook Signature Failed');
        return response()->json(['status' => 'invalid'], 400);
    }

    $event = $request->input('event');

    Log::info('Razorpay Webhook Hit', $request->all());

    // ✅ PAYMENT SUCCESS
    if ($event === 'payment.captured') {

        $payment = $request->input('payload.payment.entity');

        $razorpayOrderId = $payment['order_id'] ?? null;
        $razorpayPaymentId = $payment['id'] ?? null;

        if ($razorpayOrderId) {
            DB::table('tbl_orders')
                ->where('o_razorpay_order_id', $razorpayOrderId)
                ->update([
                    'o_payment_status' => 'paid',
                    'o_order_status'   => 'confirmed',
                    'o_razorpay_payment_id' => $razorpayPaymentId,
                    'o_updated_at'     => now(),
                ]);

            Log::info("Order confirmed via webhook: {$razorpayOrderId}");
        }
    }

    // ❌ PAYMENT FAILED
    if ($event === 'payment.failed') {
        Log::warning('Payment failed webhook', $request->all());
    }

    return response()->json(['status' => 'ok']);
}


 
}
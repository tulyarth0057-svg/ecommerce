<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class RazorpayController extends Controller
{
    // CREATE RAZORPAY ORDER
    public function createRazorpayOrder(Request $request)
    {
        try {
            $userId = Auth::id();
            if (!$userId) return response()->json(['error' => 'Unauthorized'], 401);

            $request->validate([
                'amount' => 'required|numeric|min:1',
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'nullable',
                'postcode' => 'required',
                'o_order_notes' => 'nullable|string|max:500',
                'shipping_charge' => 'required|numeric',
                'distance_km' => 'nullable|numeric',
                'latitude' => 'required|numeric', 
                'longitude' => 'required|numeric', 
                'razorpay_payment_id' => 'required',
                'razorpay_order_id' => 'required',
                'razorpay_signature' => 'required',
                'formData' => 'required|array',

                ]);
            $amount = (int) $request->amount;

            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            $razorpayOrder = $api->order->create([
                'receipt' => 'ORD_' . time(),
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1
            ]);

            return response()->json([
                'razorpay_order_id' => $razorpayOrder['id'],
                'amount' => $razorpayOrder['amount'],
                'currency' => 'INR'
            ]);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    // VERIFY PAYMENT AND PLACE ORDER
    public function verifyRazorpayPayment(Request $request)
    {


        $request->validate([

        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'nullable',
        'postcode' => 'required',
         'o_order_notes' => 'nullable|string|max:500',
        'shipping_charge' => 'required|numeric',
         'distance_km' => 'nullable|numeric',
         'latitude' => 'required|numeric', 
        'longitude' => 'required|numeric', 
        'razorpay_payment_id' => 'required',
        'razorpay_order_id' => 'required',
        'razorpay_signature' => 'required',
        'formData' => 'required|array',

        ]);

        $generatedSignature = hash_hmac(
            'sha256',
            $request->o_razorpay_order_id . '|' . $request->o_razorpay_payment_id,
            config('services.razorpay.secret')
        );

        if ($generatedSignature !== $request->razorpay_signature) {
            return response()->json(['success' => false, 'message' => 'Signature mismatch'], 400);
        }

        $data = $request->formData;
        $userId = Auth::id();

        // CART TOTAL
        $cartItems = DB::table('addtocart')
            ->join('products', 'addtocart.p_id', '=', 'products.p_id')
            ->join('color', 'addtocart.color_id', '=', 'color.color_id')
            ->join('sizes', function ($join) {
                $join->on('addtocart.size_id', '=', 'sizes.size_id')
                     ->on('color.color_id', '=', 'sizes.size_color_id');
            })
            ->where('addtocart.user_id', $userId)
            ->select(DB::raw('
                ((products.p_price + COALESCE(sizes.size_price_adjustment,0) + COALESCE(color.color_price_adjustment,0)) * addtocart.p_quantity) as item_total
            '))
            ->get();

        $subtotal = $cartItems->sum('item_total');
        $shipping = isset($data['shippingCharge']) ? (float)$data['shippingCharge'] : 0;
        $grandTotal = round($subtotal + $shipping, 2);

        // INSERT ORDER
        $orderId = DB::table('tbl_orders')->insertGetId([
            'o_user_id' => $userId,
            'o_order_number' => 'ORD-' . time(),
            'o_name' => $data['name'],
            'o_email' => $data['email'],
            'o_phone' => $data['phone'],
            'o_street_address' => $data['address'],
            'o_city' => $data['city'],
            'o_state' => $data['state'],
            'o_postcode' => $data['postcode'],
            'o_subtotal' => $subtotal,
            'o_shipping_cost' => $shipping,
            'o_total_amount' => $grandTotal,
            'o_payment_method' => 'online',
            'o_payment_status' => 'paid',
            'o_order_status' => 'confirmed',
            'o_razorpay_order_id' => $request->o_razorpay_order_id,
            'o_razorpay_payment_id' => $request->razorpay_payment_id,
            'o_razorpay_signature' => $request->razorpay_signature,
            'o_latitude' => $validated['latitude'] ?? null,
            'o_longitude' => $validated['longitude'] ?? null,  
            'o_created_at' => now(),
            'o_updated_at' => now(),
        ]);

        // INSERT ORDER ITEMS
        foreach ($cartItems as $item) {
            DB::table('tbl_order_items')->insert([
                'o_i_order_id' => $orderId,
                'o_i_product_id' => $item->p_id ?? null,
                'o_i_color_id' => $item->color_id ?? null,
                'o_i_quantity' => $item->p_quantity ?? 1,
                'o_i_product_price' => $item->p_price ?? 0,
                'o_i_total_price' => $item->item_total,
                'o_i_created_at' => now(),
                'o_i_updated_at' => now(),
            ]);
        }

        // CLEAR CART
        DB::table('addtocart')->where('user_id', $userId)->delete();

        return response()->json(['success' => true, 'order_id' => $orderId]);
    }
}

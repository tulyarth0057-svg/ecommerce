<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItem;
use App\Models\Order;
use Razorpay\Api\Api;

class OrderController extends Controller
{

/**
 * 🔥 PROCESS CHECKOUT
 */
public function processCheckout(Request $request)
{
    $userId = Auth::id();

    if (!$userId) {
        return redirect()->route('signin');
    }

    // Validate
    $validated = $request->validate([
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

    ]);

    // Fetch cart with REAL quantity and color
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
            'addtocart.size_id',
            'addtocart.color_id',
            'addtocart.p_quantity',  
            'products.p_name',      
            'products.p_price',
            'color.color_name',
            'color.color_price_adjustment',
            'sizes.size_name',
            'sizes.size_price_adjustment',
            
            // Unit price (base + size + color)
            DB::raw('
                (products.p_price 
                + COALESCE(sizes.size_price_adjustment, 0) 
                + COALESCE(color.color_price_adjustment, 0)
                ) as unit_price
            '),
            
            // Item total (unit_price * quantity)
            DB::raw('
                (
                    (products.p_price 
                    + COALESCE(sizes.size_price_adjustment, 0) 
                    + COALESCE(color.color_price_adjustment, 0)
                    ) * addtocart.p_quantity
                ) as item_total
            ')
        )
        ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart')->with('error', 'Cart is empty!');
    }

    // Calculate totals
    $subtotal = (float) $cartItems->sum('item_total');
    $shipping = (float) $validated['shipping_charge'];
    $grandTotal = round($subtotal + $shipping, 2);

    // Insert Order
    $orderId = DB::table('tbl_orders')->insertGetId([
    'o_user_id'        => $userId,
    'o_order_number'   => 'ORD-' . time(),
    'o_email'          => $validated['email'],
    'o_name'           => $validated['name'],
    'o_phone'          => $validated['phone'],
    'o_order_notes'    => $validated['o_order_notes'] ?? null,
    'o_street_address' => $validated['address'],
    'o_city'           => $validated['city'],
    'o_state'          => $validated['state'],
    'o_postcode'       => $validated['postcode'],
    'o_subtotal'       => $subtotal,
    'o_shipping_cost'  => $shipping,
    'o_total_amount'   => $grandTotal,
    'o_payment_method' => 'cash',
    'o_payment_status' => 'pending',
    'o_order_status'   => 'pending',
    'o_latitude'       => $validated['latitude'] ?? null,
    'o_longitude'      => $validated['longitude'] ?? null,  
    'o_created_at'     => now(),
    'o_updated_at'     => now(),
]);


    // Insert Order Items
    foreach ($cartItems as $item) {
        DB::table('tbl_order_items')->insert([
            'o_i_order_id'       => $orderId,
            'o_i_product_id'     => $item->p_id,
           'o_i_color_id'        => $item->color_id,
            'o_i_product_name'   => $item->p_name,  
            'o_i_quantity'       => $item->p_quantity,  
            'o_i_size'           => $item->size_name,  
            'o_i_size_price'     => $item->size_price_adjustment ?? 0,
            'o_i_product_price'  => $item->p_price,
            // 'o_i_color'          => $item->color_name,  // ✅ Color name
            // 'o_i_color_price'    => $item->color_price_adjustment ?? 0,
            'o_i_total_price'    => $item->item_total,  // ✅ Full total
            'o_i_created_at'     => now(),
            'o_i_updated_at'     => now(),
        ]);
    }

    // Clear Cart
    DB::table('addtocart')->where('user_id', $userId)->delete();

    return redirect()->route('order.success', $orderId)
           ->with('success', 'Order placed successfully!');
}


/**
 * ✅ ORDER SUCCESS PAGE
 */
public function orderSuccess($orderId)
{
    $userId = Auth::id();
    if (!$userId) {
        return redirect()->route('signin');
    }

    // Selected order (only of logged-in user)
    $order = DB::table('tbl_orders')
        ->where('o_id', $orderId)
        ->where('o_user_id', $userId)
        ->first();

    if (!$order) {
        abort(404);
    }

    // Order items
    $orderItems = OrderItem::with('size')
        ->where('o_i_order_id', $orderId)
        ->get();

    // ✅ ALL orders (new + old) of logged-in user
    $allOrders = DB::table('tbl_orders')
        ->where('o_user_id', $userId)
        ->orderBy('o_created_at', 'desc') 
        ->get();

    return view('order', compact('order', 'orderItems', 'allOrders'));
}


 /**
     * ✅ VIEW ORDER (From order list/history)
     */
public function myorder($orderId)
{
    $userId = Auth::id();
    if (!$userId) {
        return redirect()->route('signin');
    }

    // All orders of user
    $allOrders = DB::table('tbl_orders')
        ->where('o_user_id', $userId)
        ->orderBy('o_created_at', 'desc')
        ->get();

    if ($allOrders->isEmpty()) {
        return redirect()->route('my.order')->with('error', 'No orders found');
    }

    // Selected order (optional highlight)
    $order = $allOrders->firstWhere('o_id', $orderId);

    // ✅ GET ITEMS OF ALL ORDERS
    $orderItems = DB::table('tbl_order_items as oi')
        ->leftJoin('products as p', 'p.p_id', '=', 'oi.o_i_product_id')
        ->leftJoin('color as c', 'c.color_id', '=', 'oi.o_i_color_id')
        ->leftJoin('images as i', function ($join) {
            $join->on('i.img_color_id', '=', 'c.color_id')
                ->whereRaw('i.img_id = (
                    SELECT MIN(img_id)
                    FROM images i2
                    WHERE i2.img_color_id = c.color_id
                )');
        })
        ->whereIn('oi.o_i_order_id', $allOrders->pluck('o_id')) // 🔥 KEY LINE
        ->select(
            'oi.*',
            DB::raw('COALESCE(c.color_name, "") as color_name'),
            DB::raw('COALESCE(c.color_code, "") as color_code'),
            DB::raw('COALESCE(i.img_path, "") as img_path')
        )
        ->get();

    return view('my-order', compact('order', 'orderItems', 'allOrders'));
}


// order-detail-page---->

// Controller
public function getOrderdetail($orderId)
{
    $userId = Auth::id();

    if (!$userId) {
        return redirect()->route('signin');
    }

    // Get the order for this user
    $order = Order::where('o_id', $orderId)
        ->where('o_user_id', $userId)
        ->firstOrFail();

   $orderItems = DB::table('tbl_order_items as oi')
    ->leftJoin('color as c', 'c.color_id', '=', 'oi.o_i_color_id')
    ->leftJoin('images as i', function ($join) {
        $join->on('i.img_color_id', '=', 'c.color_id')
             ->whereRaw('i.img_id = (
                 SELECT MIN(i2.img_id)
                 FROM images i2
                 WHERE i2.img_color_id = c.color_id
             )');
    })
    ->where('oi.o_i_order_id', $orderId)
    ->select(
        'oi.*',
        'c.color_name',
        'c.color_code',
        'i.img_path'
    )
    ->get();

$totalItemsPrice = $orderItems->sum('o_i_total_price');
$grandTotal = $totalItemsPrice + ($order->o_shipping_cost ?? 0);

return view('order-detail', compact(
    'order',
    'orderItems',
    'totalItemsPrice',
    'grandTotal',
    
));

}


// track order

public function trackOrder($order_number)
    {
        // Fetch order along with its status timeline
        $order = Order::with('statuses')
            ->where('o_order_number', $order_number)
            ->firstOrFail(); // Throws 404 if order not found

        // Return the separate track order page
        return view('track-order', compact('order'));
    }



    // admin order-list------>

     public function showOrderlist()
    {
      
       $orders = Order::latest()->get();

        
        return view('admin.order-list', compact('orders'));
    }

    // vieworder-admin-controller--->
       

public function AdminVieworder($orderId)
{
    // Get the order (NO user restriction for admin)
    $order = Order::where('o_id', $orderId)->firstOrFail();

    // Get order items with color + image
    $orderItems = DB::table('tbl_order_items as oi')
        ->leftJoin('color as c', 'c.color_id', '=', 'oi.o_i_color_id')
        ->leftJoin('images as i', function ($join) {
            $join->on('i.img_color_id', '=', 'c.color_id')
                 ->whereRaw('i.img_id = (
                     SELECT MIN(i2.img_id)
                     FROM images i2
                     WHERE i2.img_color_id = c.color_id
                 )');
        })
        ->where('oi.o_i_order_id', $orderId)
        ->select(
            'oi.*',
            'c.color_name',
            'c.color_code',
            'i.img_path'
        )
        ->get();

    // Calculate totals
    $totalItemsPrice = $orderItems->sum('o_i_total_price');
    $grandTotal = $totalItemsPrice + ($order->o_shipping_cost ?? 0);

    // Return admin view
    return view('admin.view-order', compact(
        'order',
        'orderItems',
        'totalItemsPrice',
        'grandTotal'
    ));
}





    


}









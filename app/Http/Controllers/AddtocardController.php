<?php

namespace App\Http\Controllers;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\addtocart;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;


class AddtocardController extends Controller
{
     
   public function index()
    {
        $userId = Auth::id();

        // Fetch cart items with product, size, color, images
        $cartItems = DB::table('addtocart')
            ->leftJoin('products', 'addtocart.p_id', '=', 'products.p_id')
            ->leftJoin('color', 'addtocart.color_id', '=', 'color.color_id')

          ->leftJoin('images', function($join) {
          $join->on('color.color_id', '=', 'images.img_color_id')
         ->whereRaw('images.img_id = (
             SELECT MIN(img_id) 
             FROM images 
             WHERE img_color_id = color.color_id
             LIMIT 1
         )');
})
                      
            ->leftJoin('sizes', function ($join) {
                $join->on('addtocart.size_id', '=', 'sizes.size_id')
                     ->on('color.color_id', '=', 'sizes.size_color_id');
            })
            ->select(
                'addtocart.cart_id',
                // 'addtocart.qty',
                'products.p_name',
                'products.p_price',
                'color.color_name',
                'sizes.size_name',
                'sizes.size_price_adjustment',
                'images.img_path',
                'images.img_alt_text'
            )
            ->where('addtocart.user_id', $userId)
            ->get();
            
        

        return view('cart', compact('cartItems'));
    }
    

    // Add Item to Cart
   public function addToCart(Request $request)
{
    $userId = Auth::id();

    if (!$userId) {
        return response()->json([
            'status' => false,
            'message' => 'Please login first'
        ], 401);
    }

    $request->validate([
        'p_id' => 'required|exists:products,p_id',
        'size_id' => 'required',
        'color_id' => 'required|exists:color,color_id',
    ]);

    // Check if item already exists
    $cartItem = DB::table('addtocart')
        ->where('user_id', $userId)
        ->where('p_id', $request->p_id)
        ->where('size_id', $request->size_id)
        ->where('color_id', $request->color_id)
        ->first();

    // ✅ FIX: Get the actual price value
    $productPrice = DB::table('products')
        ->where('p_id', $request->p_id)
        ->value('p_price');

    // Size adjustment
    $sizeAdjustment = DB::table('sizes')
        ->where('size_id', $request->size_id)
        ->value('size_price_adjustment') ?? 0;

    // Color adjustment
    $colorAdjustment = DB::table('color')
        ->where('color_id', $request->color_id)
        ->value('color_price_adjustment') ?? 0;

    $finalPrice = $productPrice + $sizeAdjustment + $colorAdjustment;

    if ($cartItem) {
        // Item already exists
        return response()->json([
            'status' => false,
            'message' => 'Item already in cart'
        ]);
    } else {
        // Insert new cart item
        DB::table('addtocart')->insert([
            'user_id' => $userId,
            'p_id' => $request->p_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    // Fetch updated cart items
    $cartItems = DB::table('addtocart')
        ->join('products', 'addtocart.p_id', '=', 'products.p_id')
        ->join('color', 'addtocart.color_id', '=', 'color.color_id')
        ->join('images', 'images.img_color_id', '=', 'color.color_id')
        ->join('sizes', function($join) {
            $join->on('addtocart.size_id', '=', 'sizes.size_id')
                 ->on('color.color_id', '=', 'sizes.size_color_id');
        })
        ->where('addtocart.user_id', $userId)
        ->select(
            'addtocart.cart_id',
            'products.p_name',
            'products.p_price',
            'color.color_name',
            'sizes.size_name',
            'sizes.size_price_adjustment',
            'images.img_path',
            'images.img_alt_text'
        )
        ->get();

    // ✅ FIX: Count items instead of sum
    $cartCount = DB::table('addtocart')
        ->where('user_id', $userId)
        ->count();

    return response()->json([
        'status' => true,
        'message' => 'Product added to cart',
        'cart_count' => $cartCount,
        'cart_items' => $cartItems
    ]);
}


// remove item form cart----->
public function removeFromCart($cart_id)
{
    $userId = Auth::id();

    // Check if item belongs to current user
    $cartItem = DB::table('addtocart')
        ->where('cart_id', $cart_id)
        ->where('user_id', $userId)
        ->first();

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item not found in cart');
    }

    // Delete the item
    DB::table('addtocart')
        ->where('cart_id', $cart_id)
        ->where('user_id', $userId)
        ->delete();

    return redirect()->back()->with('success', 'Item removed from cart');
}
}

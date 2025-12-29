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
            ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
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
            // 'qty' => 'required|integer|min:1'
        ]);

        // Check if item already exists
        $cartItem = DB::table('addtocart')
            ->where('user_id', $userId)
            ->where('p_id', $request->p_id)
            ->where('size_id', $request->size_id)
            ->where('color_id', $request->color_id)
            ->first();

        // Base product price
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
            // Increment quantity
            DB::table('addtocart')
                ->where('cart_id', $cartItem->cart_id);
                // ->increment('qty', $request->qty);
        } else {
            // Insert new cart item
            DB::table('addtocart')->insert([
                'user_id' => $userId,
                'p_id' => $request->p_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                // 'qty' => $request->qty,
                'p_price' => $finalPrice,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Fetch updated cart items for JSON response (with images)
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
                // 'addtocart.qty',
                'products.p_name',
                'products.p_price',
                'color.color_name',
                'sizes.size_name',
                'images.img_path',
                'images.img_alt_text'
            )
            ->get();

        $cartCount = DB::table('addtocart')
            ->where('user_id', $userId)
            ->sum('qty');

        return response()->json([
            'status' => true,
            'message' => 'Product added to cart',
            'cart_count' => $cartCount,
            'cart_items' => $cartItems // ✅ Images included
        ]);
    }
}

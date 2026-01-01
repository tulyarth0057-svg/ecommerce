<?php

namespace App\Http\Controllers;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\addtocart;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\whistlist;


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
            'addtocart.p_id',
            'addtocart.size_id',
            'addtocart.color_id',
            // 'addtocart.qty', // 👈 Agar quantity column hai toh uncomment karo
            'products.p_name',
            'products.p_price',
            'color.color_name',
            'color.color_price_adjustment', 
            'sizes.size_name',
            'sizes.size_price_adjustment',
            'images.img_path',
            'images.img_alt_text',
            
            // 👇 YEH ADD KARO - Final Price Calculation
            DB::raw('(
                products.p_price + 
                COALESCE(sizes.size_price_adjustment, 0) + 
                COALESCE(color.color_price_adjustment, 0)
            ) as final_price')
        )
        ->where('addtocart.user_id', $userId)
        ->get();



    // 👇 Total calculate karo
    $total = $cartItems->sum('final_price');
    
    // 👇 Cart count
    $cartCount = $cartItems->count();

    return view('cart', compact('cartItems', 'total', 'cartCount'));
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

    if ($cartItem) {
        // Item already exists
        return response()->json([
            'status' => false,
            'message' => 'Item already in cart'
        ]);
    }

    // ✅ Get product base price
    $productPrice = DB::table('products')
        ->where('p_id', $request->p_id)
        ->value('p_price');

    // ✅ Get size adjustment
    $sizeAdjustment = DB::table('sizes')
        ->where('size_id', $request->size_id)
        ->value('size_price_adjustment') ?? 0;

    // ✅ Get color adjustment (if any)
    $colorAdjustment = DB::table('color')
        ->where('color_id', $request->color_id)
        ->value('color_price_adjustment') ?? 0;

    // ✅ Calculate final price
    $finalPrice = $productPrice + $sizeAdjustment + $colorAdjustment;

    // ✅ Insert new cart item WITH PRICE
   // Insert WITHOUT price
DB::table('addtocart')->insert([
    'user_id' => $userId,
    'p_id' => $request->p_id,
    'size_id' => $request->size_id,
    'color_id' => $request->color_id,
    // 'quantity' => 1, // 👈 Agar quantity column hai
    'created_at' => now(),
    'updated_at' => now()
]);

// Fetch cart items with calculated price
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
        // 'addtocart.quantity',
        'products.p_name',
        'products.p_price',
        'color.color_name',
        'sizes.size_name',
        'sizes.size_price_adjustment',
        'color.color_price_adjustment',
        'images.img_path',
        'images.img_alt_text',
        // 👇 Runtime pe calculate karo
        DB::raw('(products.p_price + COALESCE(sizes.size_price_adjustment, 0) + COALESCE(color.color_price_adjustment, 0)) as final_price')
    )
    ->get();

    // Count cart items
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

public function addFromWishlist(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,p_id', // आपका प्रोडक्ट टेबल का pk
    ]);

    $productId = $request->product_id;
    $userId = auth()->id(); // login जरूरी है

    // wishlist से प्रोडक्ट ढूंढो
    $wishlistItem = Wishlist::where('user_id', $userId)
                            ->where('product_id', $productId) // column नाम चेक करो
                            ->first();

    if (!$wishlistItem) {
        return response()->json(['success' => false, 'message' => 'Item not found in wishlist']);
    }

    // प्रोडक्ट डिटेल लाओ
    $product = $wishlistItem->product; 

    Addtocard::instance('default')->add([
        'id'      => $product->p_id,
        'name'    => $product->p_name,         
        'price'   => $product->price,         
        'options' => [
            'image' => $product->image ?? '',
     
        ]
    ]);

    // ------------------ वैकल्पिक: wishlist से हटा दो ------------------
    $wishlistItem->delete();

    // सफलता मैसेज
    return response()->json([
        'success' => true,
        'message' => 'Product moved to cart successfully!'
    ]);
}

public function clear()
{
    
    if (Auth::check()) {
        Addtocart::where('user_id', Auth::id())->delete();
    } 

    return redirect()->route('cart')
        ->with('success', 'Cart successfully cleared!');
}




}

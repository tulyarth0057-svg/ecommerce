<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whistlist;
use Illuminate\Support\Facades\Auth;

class WhistlistController extends Controller
{
    // SHOW wishlist page (GET /wishlist)
   public function wishlist()
{
    $wishlists = Whistlist::with('product.colors.images')
        ->where('user_id', Auth::id())
        ->get();

    $wishlistCount = $wishlists->count(); 

    return view('whistlist', compact('wishlists', 'wishlistCount'));
}


// whistlist store---->

public function store(Request $request)
{
    $userId = auth()->id();
    $productId = $request->product_id;

    $already = Whistlist::where('user_id', $userId)
        ->where('p_id', $productId)
        ->exists();

    $wishlistCount = Whistlist::where('user_id', $userId)->count();

    if ($already) {
        return response()->json([
            'status' => false,
            'message' => 'Product already in your wishlist ❤️',
            'wishlistCount' => $wishlistCount
        ]);
    }

    Whistlist::create([
        'user_id' => $userId,
        'p_id' => $productId
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Product added to wishlist ❤️',
        'wishlistCount' => $wishlistCount + 1
    ]);
}




    // REMOVE single item (DELETE /wishlist/{id})
    public function removeWishlist($id)
    {
        Whistlist::where('w_id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Removed from wishlist');
    }

    // CLEAR wishlist (DELETE /wishlist/clear)
    public function clearWishlist()
    {
        Whistlist::where('user_id', Auth::id())->delete();

        return back()->with('success', 'Wishlist cleared successfully');
    }



    // product---addtocart--->
public function wishlistAddToCart(Request $request)
    {
        $request->validate([
            'p_id' => 'required|exists:products,p_id',  
        ]);

        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first'
            ], 401);
        }

        $wishlistItem = Whistlist::where('user_id', $user->id)
                                 ->where('p_id', $request->product_id)
                                 ->first();

        if (!$wishlistItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in your wishlist'
            ], 404);
        }

        $product = $wishlistItem->product;   // thanks to relation

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Add to cart using the standard package
        Cart::instance('default')->add([
            'id'      => $product->p_id,
            'name'    => $product->p_name,
            'qty'     => 1,
            'price'   => $product->p_price,           // or discounted price if exists
            'weight'  => 0,
            'options' => [
                'image' => $product->img_path ?? null,   // adjust field name
                // 'color' => ..., 'size' => ... if needed later
            ]
        ]);

        // Optional but recommended: remove from wishlist (move action)
        $wishlistItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product moved to cart successfully!',
            'cart_count' => Addtocart::instance('default')->count(),  
        ]);
    }




}

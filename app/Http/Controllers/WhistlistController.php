<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whistlist;
use Illuminate\Support\Facades\Auth;
use Cart;

class WhistlistController extends Controller
{
    // ==========================
    // SHOW wishlist page
    // ==========================
    public function wishlist()
    {
        // ❌ Admin not allowed
        if (!Auth::check() || Auth::user()->role === 'admin') {
            return redirect('/')->with('error', 'Only users can access wishlist');
        }

        $wishlists = Whistlist::with('product.colors.images')
            ->where('user_id', Auth::id())
            ->get();

        $wishlistCount = $wishlists->count();

        return view('whistlist', compact('wishlists', 'wishlistCount'));
    }

    // ==========================
    // ADD to wishlist (AJAX)
    // ==========================
    public function store(Request $request)
    {
        // ✅ Login check
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'message' => 'Please login first'
            ], 401);
        }

        $user = Auth::user();

        // ❌ Admin cannot add wishlist
        if ($user->role === 'admin') {
            return response()->json([
                'status' => false,
                'message' => 'Admin cannot add products to wishlist'
            ], 403);
        }

        $productId = $request->product_id;

        $already = Whistlist::where('user_id', $user->id)
            ->where('p_id', $productId)
            ->exists();

        $wishlistCount = Whistlist::where('user_id', $user->id)->count();

        if ($already) {
            return response()->json([
                'status' => false,
                'message' => 'Product already in your wishlist ❤️',
                'wishlistCount' => $wishlistCount
            ]);
        }

        Whistlist::create([
            'user_id' => $user->id,
            'p_id' => $productId
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product added to wishlist ❤️',
            'wishlistCount' => $wishlistCount + 1
        ]);
    }

    // ==========================
    // REMOVE single wishlist item
    // ==========================
  
       public function removeWishlist($id)
{
    if (!Auth::check() || Auth::user()->role === 'admin') {
        return response()->json([
            'success' => false,
            'message' => 'Action not allowed'
        ], 403);
    }

    $deleted = Whistlist::where('w_id', $id)
        ->where('user_id', Auth::id())
        ->delete();

    if ($deleted) {
        return response()->json([
            'success' => true,
            'message' => 'Removed from wishlist'
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Item not found or already removed'
        ], 404);
    }
}


    // ==========================
    // CLEAR wishlist
    // ==========================
    // public function clearWishlist()
    // {
    //     if (!Auth::check() || Auth::user()->role === 'admin') {
    //         return redirect()->back()->with('error', 'Action not allowed');
    //     }

    //     Whistlist::where('user_id', Auth::id())->delete();

    //     return back()->with('success', 'Wishlist cleared successfully');
    // }

    // ==========================
    // MOVE wishlist → cart
    // ==========================
    public function wishlistAddToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,p_id',
        ]);

        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first'
            ], 401);
        }

        // ❌ Admin blocked
        if ($user->role === 'admin') {
            return response()->json([
                'success' => false,
                'message' => 'Admin cannot add items to cart'
            ], 403);
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

        $product = $wishlistItem->product;

        Cart::instance('default')->add([
            'id'    => $product->p_id,
            'name'  => $product->p_name,
            'qty'   => 1,
            'price' => $product->p_price,
            'weight'=> 0,
            'options' => [
                'image' => $product->img_path ?? null,
            ]
        ]);

        // remove from wishlist
        $wishlistItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product moved to cart successfully!',
            'cart_count' => Cart::instance('default')->count(),
        ]);
    }
}

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

        return view('whistlist', compact('wishlists'));
        
    }

    // ADD to wishlist (POST /wishlist)
    public function addToWishlist(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'You must login first'
            ], 401);
        }

        if ($user->role === 'admin') {
            return response()->json([
                'status' => false,
                'message' => 'Admins cannot add products to wishlist'
            ], 403);
        }

        Whistlist::firstOrCreate([
            'user_id' => Auth::id(),
            'p_id'    => $request->product_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product added to wishlist'
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whistlist;

use Illuminate\Support\Facades\Auth;

class WhistlistController extends Controller
{

     public function whistlist()
{
    $wishlists = Whistlist::with('product')
        ->where('user_id', Auth::id())
        ->get();

    return view('whistlist', compact('wishlists'));
}



    public function addToWishlist(Request $request)
    {
       $user = Auth::user();

    if(!$user){
        return response()->json([
            'status' => false,
            'message' => 'You must login first'
        ]);
    }

    if($user->role === 'admin'){
        return response()->json([
            'status' => false,
            'message' => 'Admins cannot add products to wishlist'
        ]);
    }

    $productId = $request->product_id;


    $user->wishlist()->syncWithoutDetaching([$productId]);

    return response()->json([
        'status' => true,
        'message' => 'Product added to wishlist'
    ]);

   }

   public function remove($id)
{
    Whistlist::where('w_id', $id)
        ->where('user_id', Auth::id()) // ensure user only deletes their own item
        ->delete();

    return back()->with('success', 'Removed from wishlist');
}


}


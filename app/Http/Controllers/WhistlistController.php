<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhistlistController extends Controller
{

       public function whistlist()
    {
        return view('whistlist');
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

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddtocardController extends Controller
{
    public function addFromWishlist(Request $request)
{
    $productId = $request->input('p_id');
    
    // Assuming you have a Cart model or session-based cart
    $product = Product::find($productId);
    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Product not found.']);
    }

    // Example using session-based cart
    $cart = session()->get('cart', []);

    if(isset($cart[$productId])){
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            "name" => $product->p_name,
            "quantity" => 1,
            "price" => $product->p_price,
            "image" => $product->colors->first()->images->first()->img_path
        ];
    }

    session()->put('cart', $cart);

    return response()->json(['success' => true, 'message' => 'Product added to cart!', 'cart_count' => count($cart)]);
}

}

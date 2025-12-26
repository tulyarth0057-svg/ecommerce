<?php

namespace App\Http\Controllers;
 use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\addtocart;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;


class AddtocardController extends Controller
{
     

public function index()
{
    $cartItems = addtocart::with(['p_id', 'size_id', 'color_id'])
        ->where('user_id', Auth::id())
        ->get();

    return view('cart', compact('cartItems'));
}


    public function addToCart(Request $request)
{
    $userId = auth()->id();

    // Validate
    $request->validate([
        'p_id' => 'required|exists:products,p_id',
        'size_id' => 'required|exists:sizes,size_id',
        'color_id' => 'required|exists:colors,color_id',
        'qty' => 'required|integer|min:1',
    ]);

    // Add to cart logic
    $cart = AddToCart::where([
        'user_id' => $userId,
        'p_id' => $request->p_id,
        'size_id' => $request->size_id,
        'color_id' => $request->color_id,
    ])->first();

    if ($cart) {
        $cart->increment('qty', $request->qty);
    } else {
        $product = Product::find($request->p_id);

        $finalPrice = $product->p_price; // + size/color adjustment if any

        AddToCart::create([
            'user_id' => $userId,
            'p_id' => $product->p_id,
            'p_name' => $product->p_name,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'qty' => $request->qty,
            'price' => $finalPrice,
        ]);
    }

    return response()->json([
        'status' => true,
        'message' => 'Product added to cart successfully',
        'cart_count' => AddToCart::where('user_id', $userId)->count()
    ]);
}


}

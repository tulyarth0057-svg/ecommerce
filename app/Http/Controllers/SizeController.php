<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    // Get all sizes
    public function index()
    {
        return Size::with('color')->get();
    }

    // Add size
    public function store(Request $request)
    {
        $request->validate([
            'size_product_id' => 'required|integer',
            'size_name' => 'required|string',
            'size_price_adjustment' => 'nullable|numeric',
        ]);

        $size = Size::create($request->all());

        return response()->json(['message' => 'Size Added', 'data' => $size]);
    }





}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        return Color::with('images')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'color_product_id' => 'required|integer',
            'color_name' => 'required|string',
            'price_adjustment' => 'nullable|numeric',
            'color_code' => 'nullable|string',
        ]);

        $color = Color::create($request->all());

        return response()->json(['message' => 'Product Color Added', 'data' => $color]);
    }

    public function show($id)
    {
        $color = Color::with('images')->find($id);
        if (!$color) return response()->json(['message' => 'Color Not Found'], 404);

        return $color;
    }
}

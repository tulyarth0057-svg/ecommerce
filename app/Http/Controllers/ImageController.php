<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
        public function index()
    {
        return Image::all();
    }

    // Upload Image + Save
    public function store(Request $request)
    {
        $request->validate([
            'img_color_id' => 'nullable|integer',
            'img_alt_text' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:50000',
        ]);

        // Upload file
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);

        $image = Image::create([
            'img_color_id' => $request->img_color_id,
            'img_path' => 'images/' . $fileName,
            'img_alt_text' => $request->img_alt_text,
        ]);

        return response()->json(['message' => 'Image Uploaded', 'data' => $image]);
    }

}

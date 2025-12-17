<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\color;
use App\Models\size;
use App\Models\Image;
use App\Models\category;
use App\Models\maincategory;

class ProductController extends Controller
{
    // Show form
   public function create()
{
    $mainCategories = MainCategory::where('status', 1)->get();
    $categories = Category::all();

    return view('admin.add-product', compact('mainCategories', 'categories'));
}


    // Handle form submit
  public function store(Request $request)
{
    // Validation
    $request->validate([
        'p_name' => 'required|string|max:255',
        'p_category_id' => 'required|integer',
        'main_category_id' => 'required|integer|exists:main_categories,cat_id',
        'p_short_description' => 'nullable|string',
        'p_long_description' => 'nullable|string',
        'p_price' => 'required|numeric',
        'p_old_price' => 'nullable|numeric',
        'p_visibility_status' => 'nullable|integer',
        'p_stock' => 'nullable|integer',
        'p_type' => 'nullable|string|max:255',
    ]);

    // PRODUCT CREATE
    $product = \App\Models\Product::create([
        'p_name' => $request->p_name,
        'main_category_id' => $request->main_category_id, // must pass main category
        'p_category_id' => $request->p_category_id,
        'p_short_description' => $request->p_short_description,
        'p_long_description' => $request->p_long_description,
        'p_price' => $request->p_price,
        'p_old_price' => $request->p_old_price,
        'p_visibility_status' => $request->p_visibility_status ?? 1,
        'p_stock' => $request->p_stock ?? 0,
        'p_type' => $request->p_type ?? 'simple',
    ]);

    // COLORS SAVE
    if ($request->colorname) {
        foreach ($request->colorname as $index => $colorName) {
            $colorCode = $request->colorcode[$index] ?? null;
            $priceAdj = $request->priceadjustment[$index] ?? 0;

            // Save color
            $color = \App\Models\Color::create([
                'color_product_id' => $product->p_id,
                'color_name' => $colorName,
                'color_code' => $colorCode,
                'color_price_adjustment' => $priceAdj,
            ]);

            // Save sizes for this color
            if (isset($request->sizename[$index]) && is_array($request->sizename[$index])) {
                foreach ($request->sizename[$index] as $sIndex => $sizeName) {
                    $sizePrice = $request->sizepriceadjustment[$index][$sIndex] ?? 0;

                    \App\Models\Size::create([
                        'size_color_id' => $color->color_id,
                        'size_name' => $sizeName,
                        'size_price_adjustment' => $sizePrice,
                    ]);
                }
            }

            // Save images for this color
         if ($request->hasFile("color_images.$index")) {
    foreach ($request->file("color_images.$index") as $imgIndex => $file) {
        $filename = $index . '_' . $imgIndex . '_' . $file->getClientOriginalName();
        $file->storeAs('public/colors', $filename);

        \App\Models\Image::create([
            'img_color_id' => $color->color_id,
            'img_path'     => $filename,
            'img_alt_text' => $color->color_name,
        ]);
    }
}
        }
    }

    return redirect()->back()->with('success','Product added successfully!');
}


// public function productlist(){
//    // Sab products fetch karo
//     $products = Product::all();
//          $products = Product::with('colors.images')->get();
//          $products = Product::with('category')->get();
//     // Pass kar do view me
//     return view('admin.productlist', compact('products'));


//             // Products with category, colors, images, and sizes
//         $products = Product::with(['category', 'colors.images', 'colors.sizes'])->get();



// }
public function productlist()
{
    $products = Product::with([
        'category',
        'colors.images',
        'colors.sizes',
        'maincategory',
    ])->get();



    return view('admin.productlist', compact('products'));
}




public function edit($id)
{
    $product = Product::with('colors.sizes', 'colors.images')->findOrFail($id);
    $categories = Category::all();
    // All main categories for dropdown
    $mainCategories = MainCategory::all();

    // Categories under selected main category (for dependent dropdown)
    $categories = Category::where('main_category_id', $product->main_category_id)->get();

    return view('admin.editproduct', compact('product', 'mainCategories', 'categories'));
}







public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete(); // Cascade delete

    return redirect()->route('product.list')->with('success', 'Product and related data deleted!');
}



// update the controller---->
public function update(Request $request, $id){
    $product = Product::findOrFail($id);

    // Update product
    $product->update([
        'p_name' => $request->p_name,
        'p_category_id' => $request->p_category_id,
         'main_category_id' => $request->main_category_id,
        'p_price' => $request->p_price,
        'p_old_price' => $request->p_old_price,
        'p_stock' => $request->p_stock,
        'p_visibility_status' => $request->p_visibility_status,
        'p_type' => $request->p_type ?? 'simple',
        'p_short_description' => $request->p_short_description,
        'p_long_description' => $request->p_long_description,
    ]);


// Loop through submitted colors
if($request->has('colorname')) {
    foreach($request->colorname as $index => $colorName) {
        $colorName = trim($colorName);
        if(empty($colorName)) continue;

        $colorId = $request->color_id[$index] ?? null;

        if($colorId) {
            // Update existing color
            $color = $product->colors()->find($colorId);
            if($color) {
                $color->update([
                    'color_name' => $colorName,
                    'color_code' => $request->colorcode[$index] ?? null,
                    'color_price_adjustment' => $request->priceadjustment[$index] ?? 0,
                ]);
            }
        } else {
            // Create new color
            $color = $product->colors()->create([
                'color_name' => $colorName,
                'color_code' => $request->colorcode[$index] ?? null,
                'color_price_adjustment' => $request->priceadjustment[$index] ?? 0,
            ]);
        }

        // Sizes for this color
        if(isset($request->sizename[$index]) && is_array($request->sizename[$index])) {
            foreach($request->sizename[$index] as $sIndex => $sizeName) {
                $sizeName = trim($sizeName ?? '');
                if(empty($sizeName)) continue;

                $sizeId = $request->size_id[$index][$sIndex] ?? null;

                if($sizeId) {
                    // Update existing size
                    $size = $color->sizes()->find($sizeId);
                    if($size) {
                        $size->update([
                            'size_name' => $sizeName,
                            'size_price_adjustment' => $request->sizepriceadjustment[$index][$sIndex] ?? 0,
                        ]);
                    }
                } else {
                    // Create new size
                    $color->sizes()->create([
                        'size_name' => $sizeName,
                        'size_price_adjustment' => $request->sizepriceadjustment[$index][$sIndex] ?? 0,
                    ]);
                }
            }
        }

        // Images for this color
        if($request->hasFile("color_images.$index")) {
            foreach($request->file("color_images.$index") as $imgFile) {
                $fileName = time().'_'.$imgFile->getClientOriginalName();
                $imgFile->storeAs('public/colors', $fileName);

                $color->images()->create([
                    'img_path' => $fileName,
                    'img_alt_text' => $color->color_name,
                ]);
            }
        }

        // Optional: remove images if requested
        if($request->has('delete_image_ids')) {
            foreach($request->delete_image_ids as $imgId) {
                $image = $color->images()->find($imgId);
                if($image) {
                    if (\Storage::exists('public/colors/' . $image->img_path)) {
                        \Storage::delete('public/colors/' . $image->img_path);
                    }
                    $image->delete();
                }
            }
        }
    }
    return redirect()->back()->with('success','Product updated successfully!');
}
}



public function view($id)
{
    $product = Product::with([
        'category',
        'colors.images',
        'colors.sizes',
        'maincategory',
    ])->findOrFail($id);

    return view('admin.viewproduct', compact('product'));
}

public function getByMainCategory($main_id)
{
    $categories = Category::where('main_category_id', $main_id)->get();
    return response()->json($categories);
}


// api part start---->
// All products with relations
public function getAllProducts()
{
    $products = Product::with([
        'category',
        'mainCategory',
        'colors.images',
        'colors.sizes'
    ])->get();

    return response()->json($products);
}

// Single product detail
public function getProductById($id)
{
    $product = Product::with([
        'category',
        'mainCategory',
        'colors.images',
        'colors.sizes'
    ])->findOrFail($id);

    return response()->json($product);
}

// Products by main category
public function getProductsByMainCategory($main_id)
{
    $products = Product::with([
        'category',
        'colors.images',
        'colors.sizes'
    ])->where('main_category_id', $main_id)->get();

    return response()->json($products);
}
// end part---->




}



















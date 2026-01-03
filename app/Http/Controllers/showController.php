<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class showController extends Controller
{


public function getMenShirtCollection() {
    $category = Category::where('c_name', 'men Shirts')->first();

    if (!$category) {
        abort(404, 'Category not found');
    }

    $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 1)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();

    return view('menshirtcollection', compact('products', 'category'));


}


    public function getMenFormalPantcollection()
    {
        $category = Category::where('c_name', 'Formal pants & Jeans')->first();

        if (!$category) {

            abort(404, 'Category not found');
        }

        $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 1)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();

  return view('menformalpantcollection', compact('products', 'category'));

    }


     public function getMenshoesCollection()
    {

        $category = Category::where('c_name', 'Shoes')->first();

        if (!$category) {

            abort(404, 'Category not found');
        }

       $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 1)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();

       return view('menshoescollection', compact('products', 'category'));

    }


        public function getWomenKurticollection()
        {
            $category = Category::where('c_name', "kurti's")->firstOrFail();

              $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 2)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();
            return view('womenkurticollection',compact('products', 'category'));
        }





      public function getWomenTopscollection()
    {
       $category = Category::where('c_name', 'Tops & T-Shirts')->firstOrFail();


              $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 2)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();
        return view('womentopscollection', compact('products','category'));
    }






     public function getWomenJeanscollection()
    {

        $category = Category::where('c_name', 'Jeans / Jeggings')->firstOrFail();

              $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 2)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();

        return view('womenjeanscollection', compact('products','category'));

    }

     public function getKidsToyscollection()
    {

       $category = Category::where('c_name', 'Toys & Games')->firstOrFail();


              $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 3)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();

        return view('kidstoyscollection1', compact('products','category'));
    }


      public function getKidsColthescollection()
    {
           $category = Category::where('c_name', 'kids clothing')->firstOrFail();


              $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 3)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();


        return view('kidsClothingcollection2', compact('products','category'));
    }
     public function getKidsAccessoriescollection()
    {
           $category = Category::where('c_name', 'kids Accessories')->firstOrFail();


              $products = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                      INNER JOIN color c ON images.img_color_id = c.color_id
                      WHERE c.color_product_id = products.p_id
                      ORDER BY images.img_id 
                      LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 3)
        ->where('products.p_category_id', $category->c_id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.main_category_id',
            'products.p_category_id',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_price',
            'products.p_old_price',
            'products.p_visibility_status',
            'products.p_stock',
            'products.p_type',
            'products.created_at',
            'products.updated_at'
        )
        ->get();

        return view('kidsAccessoriescollection3', compact('products','category'));

    }
      public function MenMaincollection()
    {

        $products = Product::all();

        return view('Mencategorycollection', compact('products'));

    }

     public function WomenMaincollection()
    {
        // Sab products database se fetch kare
        $products = Product::all();

        return view('Womencategorycollection', compact('products'));
    }


     public function KidsMaincollection()
    {
        // Sab products database se fetch kare
        $products = Product::all();

        return view('Kidscategorycollection', compact('products'));
    }


    public function showByCategory($category)
    {
     // Category ke hisaab se products filter karo--->
         $products = Product::where('category', $category)->get();

        return view('collection', compact('products', 'category'));
    }


    // product-view ----->
public function productview($id)
{
    // 1️⃣ Product + single image (listing style)
    $product = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.p_price',
            'products.p_old_price',
            'products.p_stock',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_category_id',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text')
        )
        ->where('products.p_id', $id)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.p_price',
            'products.p_old_price',
            'products.p_stock',
            'products.p_short_description',
            'products.p_long_description',
            'products.p_category_id' 
        )
        ->first();
        

    if (!$product) {
        abort(404);
    }
    $images = DB::table('images')
    ->join('color', 'images.img_color_id', '=', 'color.color_id')
    ->where('color.color_product_id', $id)
    ->select(
        'images.img_path',
        'images.img_alt_text',
        'color.color_id as color_id'
    )
    ->get();


    // 2️⃣ Colors
    $colors = DB::table('color')
        ->where('color_product_id', $id)
        ->get();

    // 3️⃣ Sizes (color wise attach)
    foreach ($colors as $color) {
        $color->sizes = DB::table('sizes')
            ->where('size_color_id', $color->color_id)
              ->where('size_price_adjustment', $color->color_id)
            ->get();
    }

    foreach ($colors as $color) {
    $color->sizes = DB::table('sizes')
        ->where('size_color_id', $color->color_id)
        ->select(
            'size_id',
            'size_name',
            'size_price_adjustment'
        )
        ->get();
}


    
  $relatedProducts = DB::table('products')
    ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
    ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
    ->select(
        'products.p_id',
        'products.p_name',
        'products.p_price',
        'products.p_old_price',
         'products.p_category_id',
        DB::raw('MIN(images.img_path) as img_path'),
        DB::raw('MIN(images.img_alt_text) as img_alt_text')
    )
    ->where('products.p_category_id', $product->p_category_id)
    ->where('products.p_id', '!=', $id)
    ->groupBy(
        'products.p_id',
        'products.p_name',
        'products.p_price',
        'products.p_old_price',
         'products.p_category_id'
    )
    ->get();


    
    $product->colors = $colors;

    return view('product-view', compact('product','images', 'relatedProducts'));
}


}

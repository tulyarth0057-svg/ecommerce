<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\DB;

use App\Models\Product;

class HomeController extends Controller
{

   public function index()
{
    // MEN PRODUCTS (main_category_id = 1)
    $menProducts = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.p_price',
            'products.p_old_price',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                INNER JOIN color c ON images.img_color_id = c.color_id
                WHERE c.color_product_id = products.p_id
                ORDER BY images.img_id 
                LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 1)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.p_price',
            'products.p_old_price'
        )
        ->limit(6)
        ->get();


    // WOMEN PRODUCTS (main_category_id = 2)
    $womenProducts = DB::table('products')
        ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
        ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
        ->select(
            'products.p_id',
            'products.p_name',
            'products.p_price',
            'products.p_old_price',
            DB::raw('MIN(images.img_path) as img_path'),
            DB::raw('MIN(images.img_alt_text) as img_alt_text'),
            DB::raw('(SELECT img_path FROM images 
                INNER JOIN color c ON images.img_color_id = c.color_id
                WHERE c.color_product_id = products.p_id
                ORDER BY images.img_id 
                LIMIT 1 OFFSET 1) as hover_img_path')
        )
        ->where('products.main_category_id', 2)
        ->groupBy(
            'products.p_id',
            'products.p_name',
            'products.p_price',
            'products.p_old_price'
        )
        ->limit(6)
        ->get();

        // featured product section---->
        // FEATURED PRODUCTS (assuming `is_featured` = 1)
       $featuredProducts = DB::table('products')
    ->leftJoin('color', 'products.p_id', '=', 'color.color_product_id')
    ->leftJoin('images', 'color.color_id', '=', 'images.img_color_id')
    ->select(
        'products.p_id',
        'products.p_name',
        'products.p_price',
        'products.p_old_price',
        DB::raw('MIN(images.img_path) as img_path'),
        DB::raw('MIN(images.img_alt_text) as img_alt_text'),
        DB::raw('(SELECT img_path FROM images 
            INNER JOIN color c ON images.img_color_id = c.color_id
            WHERE c.color_product_id = products.p_id
            ORDER BY images.img_id 
            LIMIT 1 OFFSET 1) as hover_img_path')
    )
    ->where('products.p_type', 'featured') // fetch all featured
    ->groupBy(
        'products.p_id',
        'products.p_name',
        'products.p_price',
        'products.p_old_price'
    )
    ->get(); // remove limit if you want ALL featured


 

    return view('home', compact('menProducts', 'womenProducts','featuredProducts'));
}






}


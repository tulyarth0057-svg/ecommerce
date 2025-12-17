<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

// Main Categories API
Route::get('/main-categories', [MainCategoryController::class, 'maincateindex']);

// Categories API (optional: by main category)
Route::get('/categories', [CategoryController::class, 'getAllCategories']);
Route::get('/categories/main/{main_id}', [CategoryController::class, 'getByMainCategory2']);

// Products API
Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/products/{id}', [ProductController::class, 'getProductById']);
Route::get('/products/main-category/{main_id}', [ProductController::class, 'getProductsByMainCategory']);


?>

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhistlistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\showController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/home');
});





route ::get('/about',function (){
    return view('about');
});

route ::get('/cartpage',function (){
    return view('cart-page');
});

route ::get('/checkout',function (){
    return view('checkout');
});

route ::get('/collectioncategory',function (){
    return view('collection-category');
});



route ::get('/order',function (){
    return view('order');
});

route ::get('/payment',function (){
    return view('payment');
});

route ::get('/product',function (){
    return view('product');
});

route ::get('/register',function (){
    return view('register');
});








Route::get('/sign-up', [AuthController::class, 'showsignup'])->name('signup');

Route::post('/sign-up', [AuthController::class, 'signup']);


Route::get('/signin', [AuthController::class, 'signin'])->name('signin');

Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin');


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// product routes
Route::get('/admin/add-product', [ProductController::class, 'create'])->name('product.create');
Route::post('/admin/add-product', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/product-list', [ProductController::class, 'productlist'])->name('product.list');
Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/admin/update-product/{id}',[ProductController::class, 'update'])->name('product.update');
Route::delete('/admin/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
 Route::get('/admin/product-view/{id}', [ProductController::class, 'view'])->name('product.view');





// category routes---->
 Route::get('/admin/add-category', [CategoryController::class, 'create'])->name('product.category');
 Route::post('/admin/categories', [CategoryController::class, 'store'])->name('category.store');
 Route::get('/admin/categories-list', [CategoryController::class, 'categorylist'])->name('category.list');
 Route::get('/admin/categories-edit/{id}', [CategoryController::class, 'edit'])  ->name('category.edit');
 Route::delete('/admin/categories-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
 Route::put('/admin/category-update/{id}',[CategoryController::class, 'update'])->name('category.update');

// Product creation page
Route::get('/admin/product/create', [CategoryController::class, 'createProduct'])->name('product.create');

// AJAX route → fetch sub-categories based on main category
Route::get('/get-subcategories/{main_id}', [ProductController::class, 'getByMainCategory']);
Route::get('/admin/get-categories/{main_id}', [CategoryController::class, 'getByMainCategory']);




Route::get('admin/add-product', function () {
    $mainCategories = MainCategory::all();
    $categories = Category::all(); // sub-categories

    return view('add-product', compact('mainCategories', 'categories'));
});



Route::get('/main-categories', [MainCategoryController::class, 'index']);






//  image routes

Route::get('images', [ImageController::class, 'index']);
Route::post('images', [ImageController::class, 'store']);

// color routes

Route::get('product-colors', [ColorController::class, 'index']);
Route::post('product-colors', [ColorController::class, 'store']);

// size routes

Route::get('sizes', [SizeController::class, 'index']);
Route::post('sizes', [SizeController::class, 'store']);


// show men collection--->
Route::get('/MenShrits-collection', [showController::class, 'getMenShirtCollection'])->name('menshirtcollection');
Route::get('/MenFormalpants-collection', [showController::class, 'getMenFormalPantcollection'])->name('menformalpantscollection');
Route::get('/MenShoes-collection', [showController::class, 'getMenshoesCollection'])->name('menshoescollection');

// show women collection--->
Route::get('/WomenKurti-collection', [showController::class, 'getWomenKurticollection'])->name('womenkurtiscollection');
Route::get('/WomenTops/Tshits-collection', [showController::class, 'getWomenTopscollection'])->name('womentops/t-shirtscollection');
Route::get('/WomenJeans-collection', [showController::class, 'getWomenJeanscollection'])->name('womenjeanscollection');

//kids collection----->
Route::get('/kidsToys-collection', [showController::class, 'getKidsToyscollection'])->name('kidstoyscollection1');
Route::get('/kidsclothes-collection2', [showController::class, 'getKidsColthescollection'])->name('kidsclothescollection2');
Route::get('/kidsAccessories-collection3', [showController::class, 'getKidsAccessoriescollection'])->name('kidsAccessoriescollection3');

Route::get('/Mencategorycollection', [showController::class, 'MenMaincollection'])->name('Menmaincategorycollection');

Route::get('/Womencategroy', [showController::class, 'WomenMaincollection'])->name('Womenmaincategorycollection');
Route::get('/Kidscategroy', [showController::class, 'KidsMaincollection'])->name('Kidsmaincategorycollection');

//  Route::get('/admin/add-category', [CategoryController::class, 'create'])->name('product.category');

  Route::get('/collection/{category}', [showController::class, 'showByCategory']);




// whistlist route---->

Route::post('/wishlist', [WhistlistController::class, 'addToWishlist'])->name('wishlist');

Route::get('/whistlist', [WhistlistController::class, 'whistlist'])->name('whistlist')->middleware('auth');



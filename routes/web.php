<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    AuthController,
    ProductController,
    CategoryController,
    MainCategoryController,
    AddtocardController,
    OrderController,
    WhistlistController,
    ImageController,
    ColorController,
    SizeController,
    showController,
    RazorpayController
};

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about');
Route::view('/order', 'order');
Route::view('/payment', 'payment');
Route::view('/product', 'product');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/sign-up', [AuthController::class, 'showsignup'])->name('signup');
Route::post('/sign-up', [AuthController::class, 'signup']);

Route::get('/signin', [AuthController::class, 'signin'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'post_signin'])->name('signin.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES 🔐 (AUTH + ADMIN)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [CategoryController::class, 'howHomeDashboard'])
        ->name('admin.dashboard');

    // Products
    Route::get('/add-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product-list', [ProductController::class, 'productlist'])->name('product.list');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product-view/{id}', [ProductController::class, 'view'])->name('product.view');

    // Categories
    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories-list', [CategoryController::class, 'categorylist'])->name('category.list');
    Route::get('/categories-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/categories-by-main/{main_id}', [CategoryController::class, 'getCategoriesByMain'])
        ->name('admin.categories.byMain');

    // Orders
    Route::get('/order-list', [OrderController::class, 'showOrderlist'])->name('order.list');
    Route::get('/view-order/{orderId}', [OrderController::class, 'AdminVieworder'])->name('view.order');

    // Contacts
    Route::get('/contact-list', [AuthController::class, 'showContactlist'])->name('contact.list');

    // Users
    Route::delete('/user-delete/{id}', [AuthController::class, 'deleteUser'])
        ->name('admin.user.delete');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/cart', [AddtocardController::class, 'index'])->name('cart');
    Route::post('/add-to-cart', [AddtocardController::class, 'addToCart'])->name('add-to-cart');

    Route::get('/checkout', [AddtocardController::class, 'getCheckout'])->name('checkout');
    Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');

Route::delete('/cart/{cart}', [AddtocardController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/cart/clear', [AddtocardController::class, 'clear'])->name('cart.clear');

// Update quantity of a cart item
Route::post('/cart/set-quantity', [AddtocardController::class, 'setQuantity'])->name('cart.setQuantity');

    Route::get('/wishlist', [WhistlistController::class, 'wishlist'])->name('wishlist.index');
    Route::post('/wishlist', [WhistlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [WhistlistController::class, 'removeWishlist'])->name('wishlist.remove');

    Route::get('/my-order/{orderId}', [OrderController::class, 'myorder'])->name('my.order');
    Route::get('/order-detail/{orderId}', [OrderController::class, 'getOrderdetail'])->name('view.details');
    Route::get('/track-order/{order_number}', [OrderController::class, 'trackOrder'])->name('order.track');
    // Show order success page
    Route::get('/order/success/{order}', [OrderController::class, 'orderSuccess'])
        ->name('order.success');
});

/*
|--------------------------------------------------------------------------
| COLLECTIONS & PRODUCT VIEW
|--------------------------------------------------------------------------
*/

Route::get('/product-view/{id}', [showController::class, 'productview'])->name('productview');
Route::get('/collection/{category}', [showController::class, 'showByCategory']);

Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');

/*
|--------------------------------------------------------------------------
| SUPPORT DATA
|--------------------------------------------------------------------------
*/

Route::get('/main-categories', [MainCategoryController::class, 'index']);
Route::get('/get-subcategories/{main_id}', [ProductController::class, 'getByMainCategory']);

// Media / attributes
Route::get('images', [ImageController::class, 'index']);
Route::post('images', [ImageController::class, 'store']);

Route::get('product-colors', [ColorController::class, 'index']);
Route::post('product-colors', [ColorController::class, 'store']);

Route::get('sizes', [SizeController::class, 'index']);
Route::post('sizes', [SizeController::class, 'store']);




// |--------------------------------------------------------------------------
// | Frontend Collection Routes (PUBLIC)
// |--------------------------------------------------------------------------
// */

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



//   razorpay routes--->

Route::post('/razorpay/create', [RazorpayController::class, 'createRazorpayOrder'])
    ->name('razorpay.create');

Route::post('/razorpay/verify', [RazorpayController::class, 'verifyRazorpayPayment'])
    ->name('razorpay.verify');


<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class CategoryController extends Controller
{
    // Get All Categories
    public function create()
    {
    $mainCategories = MainCategory::where('status', 1)->get();
    $categories = Category::all();

    return view('admin.addcategory', compact('mainCategories', 'categories'));
  }



    // Add Category
 public function store(Request $request)
{
    // Validate input
    $request->validate([
        'c_name' => 'required|string|max:255',
         'main_category_id' => 'required',
        'c_description' => 'nullable|string',
        'c_banner_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
        'c_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
    ]);

    // Upload images if present
    $bannerPath = null;
   if ($request->hasFile('c_banner_img')) {
    $banner = $request->file('c_banner_img');
    $bannerName = time() . '_' . $banner->getClientOriginalName();
    $banner->move(public_path('category_banners'), $bannerName);
    $bannerPath = 'category_banners/' . $bannerName;
}


    $imagePath = null;
    if ($request->hasFile('c_image')) {
        $image = $request->file('c_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('category_images'), $imageName); // moves directly to public/category_images
        $imagePath = 'category_images/' . $imageName; // save this path in DB if needed
    }


    // Create category
    $category = Category::create([
        'c_name' => $request->c_name,
        'main_category_id' => $request->main_category_id,
        'c_description' => $request->c_description,
        'c_banner_img' => $bannerPath,
        'c_image' => $imagePath,
    ]);

      return redirect()->back()->with('success', 'Category Added Successfully');
}



   public function categorylist() {
    $categories = Category::with('mainCategory')->get();
    return view('admin.categorylist', compact('categories'));
}

public function edit($id)
{
    $category = Category::with('mainCategory')->findOrFail($id);
    $category = Category::findOrFail($id);
      $mainCategories = MainCategory::where('status', 1)->get(); // fetch all active main categories

    return view('admin.editcategory', compact('category', 'mainCategories'));
}


public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully');
}
public function update(Request $request, $id)
{
    $request->validate([
        'c_name' => 'required|string|max:255',
        'main_category_id' => 'required',
        'c_description' => 'nullable|string',
        'c_banner_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
        'c_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
    ]);

    $category = Category::findOrFail($id);

    // Update banner image
    if ($request->hasFile('c_banner_img')) {
        $banner = $request->file('c_banner_img');
        $bannerName = time().'_'.$banner->getClientOriginalName();
        $banner->move(public_path('category_banners'), $bannerName);
        $category->c_banner_img = 'category_banners/'.$bannerName;
    }

    // Update category image
    if ($request->hasFile('c_image')) {
        $image = $request->file('c_image');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('category_images'), $imageName);
        $category->c_image = 'category_images/'.$imageName;
    }

    $category->c_name = $request->c_name;
    $category->c_description = $request->c_description;
    $category->main_category_id = $request->main_category_id;

    $category->save();

return redirect()->back()->with('success', 'Category updated successfully');
}


public function createproduct()
{
    // DB se sirf main categories fetch karenge (parent_id = null)
    $mainCategories = mainCategory::all(); // DB se main categories lo

    return view('admin.add-product', compact('mainCategories'));
}


public function getByMainCategory($main_id)
{
    $subcategories = Category::where('main_category_id', $main_id)->get();
    return response()->json($subcategories);
}


// All categories
public function getAllCategories()
{
    $categories = Category::with('mainCategory')->get();
    return response()->json($categories);
}




// api part ---->
// Categories by main category
public function getByMainCategory2($main_id)
{
    $categories = Category::where('main_category_id', $main_id)->get();
    return response()->json($categories);
}



// show cartegroy in home dashboard page---->

public function howHomeDashboard()
{
    // Eager load mainCategory and products
    $categories = Category::with('mainCategory', 'products')->get();

        // Count of main categories
    $mainCategoriesCount = \App\Models\MainCategory::where('status', 1)->count();



    $totalRevenue = Order::where('o_payment_status', 'completed')
                          ->sum('o_total_amount'); // total-sale-amount

    // ✅ TOTAL ITEMS SOLD
    $itemsSold = OrderItem::sum('o_i_quantity');

    //cutomer count (sign-up se)
    $customersCount = User::where('role', 'user')->count(); 
    $newCustomersToday = User::whereDate('created_at', today())->count();


    $topSellingItem = OrderItem::selectRaw('o_i_product_id, SUM(o_i_quantity) as total_qty') 
    ->groupBy('o_i_product_id')
    ->orderByDesc('total_qty')  //top selling product count
    ->with('product')
    ->first();


    $leastSellingProducts = OrderItem::selectRaw('o_i_product_id, SUM(o_i_quantity) as total_qty')
    ->groupBy('o_i_product_id')
    ->orderBy('total_qty', 'ASC') // 👈 least first
    ->with('product')
    ->limit(5)
    ->get();

    // orders--->
        $ordersCount = Order::count(); // ✅ order count
        $pendingOrders   = Order::where('o_order_status', 'pending')->count();
        $shippedOrders   = Order::where('o_order_status', 'shipped')->count();
        $deliveredOrders = Order::where('o_order_status', 'delivered')->count();

        // low stock products

        $lowStockProducts = Product::where('p_stock', '<=', 5)->get();
        $lowStockCount = $lowStockProducts->count();

        // todays sale
        $todaySales = Order::whereDate('o_created_at', Carbon::today())
        ->where('o_order_status', 'delivered')
        ->sum('o_total_amount');

        $todayOrders = Order::whereDate('o_created_at', Carbon::today())->count();

        // sales 7days-trends charts
        $salesTrend = Order::select(
        DB::raw('DATE(o_created_at) as date'),
        DB::raw('SUM(o_total_amount) as total_sales')
    )
    ->where('o_payment_status', 'completed')
    ->where('o_created_at', '>=', Carbon::now()->subDays(7))
    ->groupBy(DB::raw('DATE(o_created_at)'))
    ->orderBy('date')
    ->get();

    // order per day

    $ordersPerDay = Order::select(
        DB::raw('DATE(o_created_at) as date'),
        DB::raw('COUNT(*) as total_orders')
    )
    ->where('o_created_at', '>=', Carbon::now()->subDays(7))
    ->groupBy(DB::raw('DATE(o_created_at)'))
    ->orderBy('date')
    ->get();


    // todays order

    $todayOrders = Order::whereDate('o_created_at', today())->count();




    return view('admin.dashboard', compact('categories','mainCategoriesCount','ordersCount','totalRevenue','itemsSold','customersCount','topSellingItem','leastSellingProducts','pendingOrders',
    'shippedOrders','deliveredOrders','lowStockProducts','lowStockCount','todaySales','todayOrders','newCustomersToday','salesTrend','ordersPerDay'
));
}

// controller of click btn to change the category cards dynamic---->
public function getCategoriesByMain($main_id)
{
    $categories = Category::with('products')
                    ->where('main_category_id', $main_id)
                    ->get();

    return response()->json($categories);
}



}

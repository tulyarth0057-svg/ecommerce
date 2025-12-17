<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\MainCategory;

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

}

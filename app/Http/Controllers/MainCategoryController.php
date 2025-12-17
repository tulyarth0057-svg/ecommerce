<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;

class MainCategoryController extends Controller
{
    public function index()
    {
        $categories = MainCategory::all(); // sab categories fetch
        return response()->json($categories);
    }


    // api part--->

 public function maincateindex()
{
    $mainCategories = MainCategory::all(); // sab main categories
    return response()->json($mainCategories);
}


}


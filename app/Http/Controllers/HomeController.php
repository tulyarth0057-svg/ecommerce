<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('home', compact('products'));
    }
}


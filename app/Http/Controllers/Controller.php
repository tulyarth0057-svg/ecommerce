<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

class HomeController extends Controller{

    public function index()
    {
        return view('home');
    }



     public function about ()
    {
        return view('about');
    }



     public function cartpage()
    {
        return view('cart-page');
    }



     public function checkout()
    {
        return view('checkout');
    }



     public function colllectioncategory()
    {
        return view('collection-category');
    }



     public function order()
    {
        return view('order');
    }



     public function payment()
    {
        return view('payment');
    }



     public function product()
    {
        return view('product');
    }



  

     public function addproduct()
    {
        return view('addproduct');
    }







}






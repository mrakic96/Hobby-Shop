<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function products(){
        $products = Product::all();
        return view('products')->with('products', $products);
    }

    public function about(){
        
        return view('about');
    }
   
}

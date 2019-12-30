<?php

namespace App\Http\Controllers;
use App\Category;

use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function cart(){
        return view('cart');
    }

    public function products(){
        $products = Product::paginate(6);
        return view('products')->with('products', $products);
    }

    public function product($id){
        $product = Product::find($id);
        return view('view_product', compact('product'));
    }

    public function olovke(){
        $products = Product::where('category_id', 1)->paginate(6);
        return view('olovke')->with('products', $products);
    }

    public function kistovi(){
        $products = Product::where('category_id', 2)->paginate(6);
        return view('kistovi')->with('products', $products);
    }

    public function platna(){
        $products = Product::where('category_id', 3)->paginate(6);
        return view('platna')->with('products', $products);
    }

    public function about(){
        
        return view('about');
    }
   
}

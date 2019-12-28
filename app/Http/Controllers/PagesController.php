<?php

namespace App\Http\Controllers;
use App\Category;

use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function products(){
        $products = Product::all();
        return view('products')->with('products', $products);
    }

    public function product($id){
        $product = Product::find($id);
        return view('view_product', compact('product'));
    }

    public function olovke(){
        $products = Product::all()->where('category_id', 1);
        return view('olovke')->with('products', $products);
    }

    public function kistovi(){
        $products = Product::all()->where('category_id', 2);
        return view('kistovi')->with('products', $products);
    }

    public function platna(){
        $products = Product::all()->where('category_id', 3);
        return view('platna')->with('products', $products);
    }

    public function about(){
        
        return view('about');
    }
   
}

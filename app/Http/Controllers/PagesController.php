<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller
{
    public function getCart() {
        if (!Session::has('cart')) {
            return view('cart');
        }
        
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('products');
    }

    public function products() {
        $products = Product::paginate(6);
        return view('products')->with('products', $products);
    }

    public function product($id) {
        $product = Product::find($id);
        return view('view_product', compact('product'));
    }

    public function olovke() {
        $products = Product::where('category_id', 1)->paginate(6);
        return view('olovke')->with('products', $products);
    }

    public function kistovi() {
        $products = Product::where('category_id', 2)->paginate(6);
        return view('kistovi')->with('products', $products);
    }

    public function platna() {
        $products = Product::where('category_id', 3)->paginate(6);
        return view('platna')->with('products', $products);
    }

    public function about() {
        
        return view('about');
    }
   
}

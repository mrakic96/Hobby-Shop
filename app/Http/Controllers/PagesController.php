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

    public function getAddByOne ($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByOne($id);
        Session::put('cart', $cart);
        
        return redirect()->route('cart');
    }

    public function getReduceByOne ($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reducebyOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart');
    }

    public function getRemoveItem ($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart');
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

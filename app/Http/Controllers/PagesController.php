<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use Gate;

class PagesController extends Controller
{
    // Korisnički profil
    public function getProfile() {

        return view('profile');
    }

    // Košarica
    public function getCart() {
        if (!Session::has('cart')) {
            return view('cart');
        }
        
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    // Dodavanje proizvoda u košaricu
    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    // Inkrementiranje jednog proizvoda
    public function getAddByOne ($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByOne($id);
        Session::put('cart', $cart);
        
        return redirect()->route('cart');
    }

    // Dekrementiranje jednog proizvoda
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

    // Uklanjanje proizvoda iz košarice
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

    // Checkout view
    public function getCheckout () {
        if(Gate::allows('only-logged-user-see')){
            // Session::forget('cart');
            return view('checkout');
        }

        return redirect()->route('login');
    }

    // Zaboravi session nakog checkouta
    public function getFinishedCheckout () {
        Session::forget('cart');
        return redirect()->route('products');
    }

    // Svi proizvodi
    public function products() {
        $products = Product::paginate(6);
        return view('products')->with('products', $products);
    }

    // Jedan odabrani proizvod
    public function product($id) {
        $product = Product::find($id);
        return view('view_product', compact('product'));
    }

    // Ispis po kategoriji 'olovke'
    public function olovke() {
        $products = Product::where('category_id', 1)->paginate(6);
        return view('olovke')->with('products', $products);
    }

    // Ispis po kategoriji 'kistovi'
    public function kistovi() {
        $products = Product::where('category_id', 2)->paginate(6);
        return view('kistovi')->with('products', $products);
    }

    // Ispis po kategoriji 'platna'
    public function platna() {
        $products = Product::where('category_id', 3)->paginate(6);
        return view('platna')->with('products', $products);
    }

    // About view
    public function about() {
        
        return view('about');
    }

   //SEARCH
    public function search(Request $request) {

    //ako zelis min slova odkomentiraj
    //$request->validate(['query'=>'required|min:3',]);
    $query = $request->input('query');
    //search bez package ostavio da bi mogao copy na admin panel
  //  $products = Product::where('name', 'like', "%$query%")
  //                      ->orWhere('details', 'like', "%$query%")
  //                     -> paginate(10);


    $products= Product::search($query)->paginate(10);                    
    return view ('search-results')->with('products', $products);
    }
    
}

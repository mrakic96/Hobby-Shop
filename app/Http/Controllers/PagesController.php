<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Category;
use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe\Charge;
use Stripe\Stripe;


class PagesController extends Controller
{
    // Korisnički profil
    public function getProfile() {

        return view('profile');
    }

    // Izmjena korisničkih info
    public function getEditProfile(User $user) {  

        return view('edit-profile')->with('user', $user);
    }

    // Ažuracija korisnika
    public function getUpdateProfile(Request $request, User $user) {   
        $user->name = $request->name;
        $user->email = $request->email;

        if($user->save()){
            $request->session()->flash('success','Korisnik "'. $user->name. '" je ažuriran.');
        }else{
            $request->session()->flash('error', 'Došlo je do greške pri ažuraciji.');
        }

        return redirect()->route('profile');
    }

    //Promjena lozinke
    public function getChangePassword () {

        return view('change-password');
    }

    //Ažuriranje nove lozinke
    public function getUpdatePassword (Request $request) {
        
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {
            
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            
            if($user->save()){
                Auth::logout();
                $request->session()->flash('success','Lozinka je uspješno promijenjena. Molimo vas da se ulogirate sa novom lozinkom.');
                return redirect()->route('login');
            }
        } 
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
        if (!Session::has('cart')) {
            return view('cart');
        }
        
        if(Gate::allows('only-logged-user-see')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $total = $cart->totalPrice;

            return view('checkout', ['total' => $total]);
        }

        return redirect()->route('login');
    }

    // Zavrseno placanje 
    public function postCheckout(Request $request) {
        if (!Session::has('cart')) {
            return redirect()->route('cart');
        }

        if(Gate::allows('only-logged-user-see')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            
            \Stripe\Stripe::setApiKey('sk_test_OzEplIVGPXw8M23zij5kqmO500SDsgLfs3');
            
            try {
                \Stripe\Charge::create([
                    'amount' => $cart->totalPrice * 100,
                    'currency' => 'bam',
                    'source' => "tok_mastercard",
                    'description' => 'Hobby Shop - uplata novca',
                  ]);
                //pohrana

            $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => auth()->user() ? auth()->user()->email : null,
            'billing_name' => auth()->user() ? auth()->user()->name : null,
            'cart' => serialize($cart),            
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_total' => $cart->totalPrice,
            ]);

            //pohrana
            } catch (\Exception $e) {
                return redirect()->route('checkout')->with('error', $e->getMessage());
            }
            
            Mail::send(new OrderPlaced);
            Session::forget('cart');           
    
            
            return redirect()->route('products')-> with('success', 'Kupovina uspješna!');
        }
    }
        protected function addToOrdersTables($request, $error)
    {
                    $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_postalcode' => $request->postalcode,
            'billing_total' => 100,
            ]);


            return $order;
    }
    // Svi proizvodi
    public function products() {
        $products = Product::paginate(6);
        return view('products')->with('products', $products);
    }
    public function productslow() {
        $products = Product::orderBy('price')->paginate(6);
        return view('sortbyprice/productslow')->with('products', $products);
    }
    public function productshigh() {
        $products = Product::orderBy('price', 'desc')->paginate(6);
        return view('sortbyprice/productshigh')->with('products', $products);
    }
    // Jedan odabrani proizvod
    public function product($id) {
        $product = Product::find($id);
        return view('view_product', compact('product'));
    }

    // Ispis po kategoriji 'olovke'
    public function olovke() {
        $products = Product::where('category_id', 1)->paginate(6);
        return view('sortbycategory/olovke')->with('products', $products);
    }
    public function olovkelow() {
        $products = Product::where('category_id', 1)->orderBy('price')->paginate(6);
        return view('sortbyprice/olovkelow')->with('products', $products);
    }
    public function olovkehigh() {
        $products = Product::where('category_id', 1)->orderBy('price', 'desc')->paginate(6);
        return view('sortbyprice/olovkehigh')->with('products', $products);
    }


    // Ispis po kategoriji 'kistovi'
    public function kistovi() {
        $products = Product::where('category_id', 2)->paginate(6);
        return view('sortbycategory/kistovi')->with('products', $products);
    }
    public function kistovilow() {
        $products = Product::where('category_id', 2)->orderBy('price')->paginate(6);
        return view('sortbyprice/kistovilow')->with('products', $products);
    }
    public function kistovihigh() {
        $products = Product::where('category_id', 2)->orderBy('price', 'desc')->paginate(6);
        return view('sortbyprice/kistovihigh')->with('products', $products);
    }
    // Ispis po kategoriji 'platna'
    public function platna() {
        $products = Product::where('category_id', 3)->paginate(6);
        return view('sortbycategory/platna')->with('products', $products);
    }
    public function platnalow() {
        $products = Product::where('category_id', 3)->orderBy('price')->paginate(6);
        return view('sortbyprice/platnalow')->with('products', $products);
    }
    public function platnahigh() {
        $products = Product::where('category_id', 3)->orderBy('price', 'desc')->paginate(6);
        return view('sortbyprice/platnahigh')->with('products', $products);
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

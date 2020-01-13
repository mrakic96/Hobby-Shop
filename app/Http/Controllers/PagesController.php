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
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
    // Korisnički profil
    public function getProfile() {

        return view('profile');
    }

    //Lista narudži
    public function getPurchases(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('purchases', ['orders' => $orders]);
    }

    // Izmjena korisničkih info
    public function getEditProfile(User $user) {  

        return view('edit-profile')->with('user', $user);
    }

    // Ažuracija korisnika
    public function putUpdateProfile(Request $request, User $user) {   
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
    public function postUpdatePassword (Request $request) {
        
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8'
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
            
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            
            try {
                $foo = \Stripe\Charge::create([
                    'amount' => $cart->totalPrice * 100,
                    'currency' => 'bam',
                    'metadata' => [
                        'AccountID' => auth()->user()->id,
                        'AccountName' => auth()->user()->name,
                        'AccountEmail' => auth()->user()->email,
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'city' => $request->input('city'),
                        'address' => $request->input('address')
                    ],
                    'source' => 'tok_amex',
                    'description' => 'Hobby Shop - uplata novca',
                  ]);
                

            
                //pohrana

                $order = new Order();
                $order->cart = serialize($cart);
                $order->billing_name = $request->name;
                $order->billing_email = $request->email;
                $order->billing_address = $request->address;
                $order->billing_city = $request->city;
                $order->billing_total = $cart->totalPrice;

                Auth::user()->orders()->save($order);
                $order->cart = unserialize($order->cart);
                foreach ($order->cart->items as $item){
                $affected = DB::table('products')
                            ->where('name', $item['item']['name'])
                            ->decrement('stock', $item['qty']);
            }
            } catch (\Exception $e) {
                return redirect()->route('checkout')->with('error', $e->getMessage());
            }
            
            if($request->input('email')=="matej.rakic96@gmail.com" or $request->input('email')=="aviskic@gmail.com") { 
            
            Mail::send(new OrderPlaced($order));
            }

            Session::forget('cart');           
     
            return redirect()->route('products')-> with('success', 'Kupovina uspješna!'); 
        }
    }

    // Svi proizvodi
    public function products() {
        $products = Product::paginate(6);
        $products->withPath('');
        return view('products')->with('products', $products);
    }
    public function productslow() {
        $products = Product::orderBy('price')->paginate(6);
        $products->withPath('');
        return view('sortbyprice/productslow')->with('products', $products);
    }
    public function productshigh() {
        $products = Product::orderBy('price', 'desc')->paginate(6);
        $products->withPath('');
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
        $products->withPath('');
        return view('sortbycategory/olovke')->with('products', $products);
    }
    public function olovkelow() {
        $products = Product::where('category_id', 1)->orderBy('price')->paginate(6);
        $products->withPath('');
        return view('sortbyprice/olovkelow')->with('products', $products);
    }
    public function olovkehigh() {
        $products = Product::where('category_id', 1)->orderBy('price', 'desc')->paginate(6);
        $products->withPath('');
        return view('sortbyprice/olovkehigh')->with('products', $products);
    }


    // Ispis po kategoriji 'kistovi'
    public function kistovi() {
        $products = Product::where('category_id', 2)->paginate(6);
        $products->withPath('');
        return view('sortbycategory/kistovi')->with('products', $products);
    }
    public function kistovilow() {
        $products = Product::where('category_id', 2)->orderBy('price')->paginate(6);
        $products->withPath('');
        return view('sortbyprice/kistovilow')->with('products', $products);
    }
    public function kistovihigh() {
        $products = Product::where('category_id', 2)->orderBy('price', 'desc')->paginate(6);
        $products->withPath('');
        return view('sortbyprice/kistovihigh')->with('products', $products);
    }
    // Ispis po kategoriji 'platna'
    public function platna() {
        $products = Product::where('category_id', 3)->paginate(6);
        $products->withPath('');
        return view('sortbycategory/platna')->with('products', $products);
    }
    public function platnalow() {
        $products = Product::where('category_id', 3)->orderBy('price')->paginate(6);
        $products->withPath('');
        return view('sortbyprice/platnalow')->with('products', $products);
    }
    public function platnahigh() {
        $products = Product::where('category_id', 3)->orderBy('price', 'desc')->paginate(6);
        $products->withPath('');
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
    $products->withPath('');                    
    return view ('search-results')->with('products', $products);
    }

}

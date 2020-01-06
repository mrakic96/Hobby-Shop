<?php

namespace App\Http\Controllers\Adminpanel;

use App\Product;
use App\Category;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware ('auth');
    }

    public function index()
    {
        $orders = Order::paginate(6);
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('adminpanel.orders.index')->with('orders', $orders);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('adminpanel.orders.index');
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
    return view ('adminpanel.products.search')->with('products', $products);
    }

    
}

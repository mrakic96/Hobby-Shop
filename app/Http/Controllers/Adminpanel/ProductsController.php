<?php

namespace App\Http\Controllers\Adminpanel;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
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
        $products = Product::paginate(6);
        return view('adminpanel.products.index')->with('products', $products);
    }

    public function olovke(){
        $products = Product::where('category_id', 1)->paginate(6);
        return view('adminpanel.products.olovke')->with('products', $products);
    }

    public function kistovi(){
        $products = Product::where('category_id', 2)->paginate(6);
        return view('adminpanel.products.kistovi')->with('products', $products);
    }

    public function platna(){
        $products = Product::where('category_id', 3)->paginate(6);
        return view('adminpanel.products.platna')->with('products', $products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('adminpanel.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('image');

        //validation
        $this->validate($request,[
            'name'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        //image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        Product::create($formInput);
        return redirect()->route('adminpanel.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        $categories = Category::pluck('name', 'id');
        return view('adminpanel.products.edit', compact('categories'))->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->description = $request->description;
        // $product->category_id = $request->category_id;
        

        // $product->save();
        if($product->save()){
            $request->session()->flash('success','Proizvod "'. $product->name. '" je ažuriran.');
        }else{
            $request->session()->flash('error', 'Došlo je do greške pri ažuraciji proizvoda.');
        }

        return redirect()->route('adminpanel.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('adminpanel.products.index');
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

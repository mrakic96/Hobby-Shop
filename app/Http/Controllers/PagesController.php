<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function products(){

        return view('products');
    }

    public function about(){
        
        return view('about');
    }
   
}

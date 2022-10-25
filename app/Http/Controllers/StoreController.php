<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
       public function index()
        {
            $products = Product::orderBy('id','desc')->paginate(5);
            return view('store.storefront', compact('products'));
        }
}

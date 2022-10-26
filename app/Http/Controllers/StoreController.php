<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('store.storefront')->with('products', $products);
    }

    public function show($id) {
        $product = Product::find($id);
        return view('store.show', compact('product'));
    }

    public function store(Request $request){
        //Merge request to data
        $data = $request->all();
        $request->merge($data);

        //Validate request
        $this->validate($request,
            [
                'title' => 'bail|required|unique:products|max:255',
                'price' => 'bail|required|numeric',
                'description' => 'nullable'
            ]);
        //Add and redirect
        Product::create($request->all());
        return redirect('/products');
    }

    public function delete () {
        return view('product.delete');
    }

}

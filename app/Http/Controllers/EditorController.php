<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EditorController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(5);
        return view('products.index', compact('products'));
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create () {
        return view('products.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'bail|required|unique:products|max:255',
           'description' => 'nullable',
           'price' => 'bail|required|numeric'
        ]);

        //Add and redirect
        Product::create($request->post());

        return redirect()->route('products.index')->with('succes','succesvol toegeveogt');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Product $product)
    {
        $request->validate([
           'title' => 'bail|required|unique:products|max:255',
           'description' => 'nullable',
           'price' => 'bail|required|numeric'
        ]);

        $product->fill($request->post())->save();

        return redirect()->route('products.index')->with('succes','kanker lekker b');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('suc7','heheheha');
    }
}

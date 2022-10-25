@extends('layouts.app')
@section('title', 'products')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>List of Products</h2>
                <p>Beschikbare producten</p>
                @foreach($products as $product)
                    <div class="card">
                        <div class="card-header"><h1>{{$product->title}}</h1>
                        </div>
                        <div class="card-body">
                            <p>{{$product->description}}</p>
                            <p>{{$product->id}}"</p>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection

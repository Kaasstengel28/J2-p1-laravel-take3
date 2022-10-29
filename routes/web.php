<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'show'])->name('home');
Auth::routes();

Route::get('users', 'App\Http\Controllers\UserController@index')->name('users.index');

Route::resource('products', App\Http\Controllers\EditorController::class);
Route::resource('storefront', App\Http\Controllers\StoreController::class)->names('products');



<?php

use App\Http\Controllers\AboutmeController;
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

Route::resource('products', App\Http\Controllers\EditorController::class);
Route::get('/storefront', [App\Http\Controllers\EditorController::class, 'show'])->name('storefront');



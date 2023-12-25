<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/', (ProductController::class));
Route::resource('/product', (ProductController::class));
Route::resource('/category', (CategoryController::class));
Route::resource('/ongkir', (OngkirController::class));
Route::get('/midtrans', [OrderController::class, 'index']);


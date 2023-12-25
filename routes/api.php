<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\FlashtimeController;
use App\Http\Controllers\api\FlashproductController;
use App\Http\Controllers\api\OngkirController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PaymentGatewayController;
use App\Http\Controllers\api\LayananOngkirController;
use App\Http\Controllers\api\KuponController;
use App\Http\Controllers\api\TokoController;
use App\Http\Controllers\Cekout;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('/product',(ProductController::class));
Route::apiResource('/category',(CategoryController::class));
Route::apiResource('/user',(UserController::class));
Route::apiResource('/cart',(CartController::class));
Route::apiResource('/flashtime',(FlashtimeController::class));
Route::apiResource('/flashproduct',(FlashproductController::class));
Route::apiResource('/ongkir',(OngkirController::class));
Route::apiResource('/payment-gateway',(PaymentGatewayController::class));
Route::apiResource('/layanan-ongkir',(LayananOngkirController::class));
Route::apiResource('/kupon',(KuponController::class));
Route::apiResource('/toko',(TokoController::class));
Route::get('/jne',[OngkirController::class, 'jne']);
Route::get('/tiki',[OngkirController::class, 'tiki']);
Route::apiResource('/order',(OrderController::class));
Route::apiResource('/checkout',(Cekout::class));
Route::post('/harga-ongkir',[OngkirController::class,'harga']);



Route::get('/ongkir/city',[OngkirController::class,'kota']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/update', [AuthController::class, 'update']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});


 

    
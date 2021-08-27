<?php

use App\Http\Controllers\ShippingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Rutas encargadas de hacer las peticiones via http
Route::post('create_shipping',[ShippingController::class,'createShipping']);
Route::get('shipping_by_tracking_code/{code}',[ShippingController::class,'getShippingByTrackingCode']);


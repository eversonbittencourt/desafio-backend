<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('product', 'ProductsController@store');

Route::get('products', 'ProductsController@all');

Route::post('add_to_cart', 'CartsController@store');

Route::post('buy', 'OrdersController@store');

Route::get('history', 'OrdersController@history');

Route::get('history/{client_id}', 'OrdersController@historyByClient');

<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
// });

Route::get('user-list','UserData@userList');

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('product', 'API\ProductsController@save');
// Route::put('update-product', 'API\ProductsController@update');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
	// Route::post('product', 'API\ProductsController@save');
	Route::put('update-product', 'API\ProductsController@update');
});

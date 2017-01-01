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

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::post('/register/customer', [
        'uses' => 'CustomerController@postRegister',
        'as' => 'customer.register',
]);
Route::post('/register/seller', [
    'uses' => 'SellerController@postRegister',
    'as' => 'seller.register',
]);

Route::post('/check/seller', [
    'uses' => 'SellerController@checkSeller',
    'as' => 'seller.check'
]);
Route::post('/check/customer', [
    'uses' => 'CustomerController@checkCustomer',
    'as' => 'customer.check'
]);
Route::post('/signin/customer', [
    'uses' => 'CustomerController@postSignIn',
    'as' => 'customer.signin',
]);
Route::post('/signin/seller', [
    'uses' => 'SellerController@postSignIn',
    'as' => 'seller.signin',
]);
Route::post('/seller/additem', [
    'uses' => 'SellerController@postAddItem',
    'as' => 'seller.additem',
]);
Route::get('/items/{id}', 'SellerController@getItems');

Route::post('/info', [
    'uses' => 'CustomerController@info',
    'as' => 'info'
]);

Route::get('/preview', [
    'uses' => 'ItemController@getPreview',
    'as' => 'preview',
]);



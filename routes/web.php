<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*Route::group(['prefix' => 'seller'], function () {
  Route::get('/login', 'SellerAuth\LoginController@showLoginForm');
  Route::post('/login', 'SellerAuth\LoginController@login');
  Route::post('/logout', 'SellerAuth\LoginController@logout');

  Route::get('/register', 'SellerAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'SellerAuth\RegisterController@register');

  Route::post('/password/email', 'SellerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'SellerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'SellerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'SellerAuth\ResetPasswordController@showResetForm');
});*/

/*Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');

});*/

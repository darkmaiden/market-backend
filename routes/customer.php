<?php

/*Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('customer')->user();

    //dd($users);

    return view('customer.home');
})->name('home');*/

Route::post('/register', [
    'uses' => 'CustomerController@postRegister',
    'as' => 'register',
    'middleware' => 'auth:customer'
]);


<?php

Route::get('/', function () { return view('welcome');});
Route::get('/text', function () { return view('text');});

Route::get('/checkout-basic', 'CheckoutController@checkoutBasic');
Route::get('/checkout-standard', 'CheckoutController@checkoutStandard');
Route::get('/checkout-pro', 'CheckoutController@checkoutPro');
Route::get('/pay-with-paypal', 'CheckoutController@paywithpaypal');
Route::get('/execute-payment', 'PaymentController@executePayment');


Route::post('/create-payment', 'PaymentController@createPayment')->name('create-payment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

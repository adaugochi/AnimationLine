<?php

Route::get('/', function () { return view('welcome');});
Route::get('/text', function () { return view('text');});

Route::get('/checkout-basic', 'CheckoutController@checkoutBasic');
Route::get('/checkout-standard', 'CheckoutController@checkoutStandard');
Route::get('/checkout-pro', 'CheckoutController@checkoutPro');
Route::get('/pay-with-paypal', 'CheckoutController@paywithpaypal');
Route::get('/execute-payment', 'PaymentController@executePayment');
Route::get('/brief/{id}', 'BriefController@index');


Route::post('/create-payment', 'PaymentController@createPayment')->name('create-payment');
Route::post('/create-brief', 'BriefController@createBrief')->name('create-brief');
Route::post('/edit-brief', 'BriefController@updateBrief')->name('edit-brief');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

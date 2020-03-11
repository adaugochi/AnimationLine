<?php

Route::get('/', function () { return view('welcome');});

Route::get('/checkout-basic', 'CheckoutController@checkoutBasic');

Route::get('/checkout-standard', 'CheckoutController@checkoutStandard');

Route::get('/checkout-pro', 'CheckoutController@checkoutPro');


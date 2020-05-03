<?php
Route::get('/', function () { return view('welcome');});
Route::get('/animation-logo', function () { return view('animation-logo');})->name('animation-logo');
Route::get('/animation-text', function () { return view('animation-text');})->name('animation-text');
Route::get('/animation-video', function () { return view('animation-video');})->name('animation-video');
Route::get('/contact', function () { return view('contact');})->name('contact');

Route::get('/cart/animation-video/bronze', 'PricingController@videoBronze')->name('video-bronze');
Route::get('/cart/animation-video/silver', 'PricingController@videoSilver')->name('video-silver');
Route::get('/cart/animation-video/gold', 'PricingController@videoGold')->name('video-gold');

Route::get('/cart/animation-logo/bronze', 'PricingController@logoBronze')->name('logo-bronze');
Route::get('/cart/animation-logo/silver', 'PricingController@logoSilver')->name('logo-silver');
Route::get('/cart/animation-logo/gold', 'PricingController@logoGold')->name('logo-gold');

Route::get('/cart/animation-text/bronze', 'PricingController@textBronze')->name('text-bronze');
Route::get('/cart/animation-text/silver', 'PricingController@textSilver')->name('text-silver');
Route::get('/cart/animation-text/gold', 'PricingController@textGold')->name('text-gold');

Route::get('/pay-with-paypal', 'PricingController@paywithpaypal');
Route::get('/execute-payment', 'PaymentController@executePayment');
Route::get('/brief/{id}', 'BriefController@index');

Route::post('/create-payment', 'PaymentController@createPayment')->name('create-payment');
Route::post('/create-brief', 'BriefController@createBrief')->name('create-brief');
Route::post('/edit-brief', 'BriefController@updateBrief')->name('edit-brief');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

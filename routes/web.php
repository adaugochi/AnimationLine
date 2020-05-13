<?php
Route::get('/', function () { return view('welcome');});
Route::get('/contact', function () { return view('contact');})->name('contact');

Route::get('/animation-logo', function () {
    return view('service.animation-logo');
})->name('animation-logo');
Route::get('/animation-text', function () {
    return view('service.animation-text');
})->name('animation-text');
Route::get('/animation-video', function () {
    return view('service.animation-video');
})->name('animation-video');

Route::get('/animation-video/bronze', 'PricingController@videoBronze')->name('video-bronze');
Route::get('/animation-video/silver', 'PricingController@videoSilver')->name('video-silver');
Route::get('/animation-video/gold', 'PricingController@videoGold')->name('video-gold');
Route::get('/animation-logo/bronze', 'PricingController@logoBronze')->name('logo-bronze');
Route::get('/animation-logo/silver', 'PricingController@logoSilver')->name('logo-silver');
Route::get('/animation-logo/gold', 'PricingController@logoGold')->name('logo-gold');
Route::get('/animation-text/bronze', 'PricingController@textBronze')->name('text-bronze');
Route::get('/animation-text/silver', 'PricingController@textSilver')->name('text-silver');
Route::get('/animation-text/gold', 'PricingController@textGold')->name('text-gold');

Route::get('/pay-with-paypal', 'PricingController@paywithpaypal');
Route::get('/execute-payment', 'PaymentController@executePayment');
Route::get('/cancel-payment', 'PaymentController@cancelPayment');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/create-payment', 'PaymentController@createPayment');
Route::post('/pay-with-paystack', 'PaymentController@redirectToGateway');

Route::get('/brief/2D-animation-video/{package}/{id}', 'BriefController@videoService');
Route::get('/brief/logo-animation/{package}/{id}', 'BriefController@logoService');
Route::get('/brief/kinetic-text-typography-animation/{package}/{id}', 'BriefController@textService');
Route::get('/brief/completed', 'BriefController@completed');
Route::post('/create-brief', 'BriefController@createBrief')->name('create-brief');
Route::post('/edit-brief', 'BriefController@updateBrief')->name('edit-brief');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/execute-payment', 'PaymentController@executePayment');
Route::get('/cancel-payment', 'PaymentController@cancelPayment');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/pay-with-paypal', 'PaymentController@createPayment');
Route::post('/pay-with-paystack', 'PaymentController@redirectToGateway');

Route::get('/brief/2D-animation-video/bronze/{id}', 'BriefController@videoBronze');
Route::get('/brief/2D-animation-video/silver/{id}', 'BriefController@videoSilver');
Route::get('/brief/2D-animation-video/gold/{id}', 'BriefController@videoGold');
Route::get('/brief/logo-animation/bronze/{id}', 'BriefController@logoBronze');
Route::get('/brief/logo-animation/silver/{id}', 'BriefController@logoSilver');
Route::get('/brief/logo-animation/gold/{id}', 'BriefController@logoGold');
Route::get('/brief/kinetic-text-typography-animation/bronze/{id}', 'BriefController@textBronze');
Route::get('/brief/kinetic-text-typography-animation/silver/{id}', 'BriefController@textSilver');
Route::get('/brief/kinetic-text-typography-animation/gold/{id}', 'BriefController@textGold');
Route::post('/create-brief', 'BriefController@createBrief')->name('create-brief');
Route::post('/edit-brief', 'BriefController@updateBrief')->name('edit-brief');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

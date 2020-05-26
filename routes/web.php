<?php
Route::get('/', function () { return view('welcome');});

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
Route::get('/execute-payment', 'PaymentController@executePayment')->name('execute-payment');
Route::get('/cancel-payment', 'PaymentController@cancelPayment')->name('cancel-payment');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/create-payment', 'PaymentController@createPayment')->name('create-payment');
Route::post('/pay-with-paystack', 'PaymentController@redirectToGateway')->name('pay-with-paystack');

Route::get('/brief/2D-animation-video/{package}/{id}', 'BriefController@videoService');
Route::get('/brief/logo-animation/{package}/{id}', 'BriefController@logoService');
Route::get('/brief/kinetic-text-typography-animation/{package}/{id}', 'BriefController@textService');
Route::get('/brief/completed', 'BriefController@completed');
Route::post('/create-brief', 'BriefController@createBrief')->name('create-brief');
Route::post('/edit-brief', 'BriefController@updateBrief')->name('edit-brief');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/submit-contact', 'ContactController@submitContact');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/forgot-password', 'Auth\AdminLoginController@forgotPassword')->name('admin.forgot-password');
    Route::get('/password/reset/{token}', 'Auth\AdminLoginController@resetPasswordForm')->name('admin.password.reset');
    Route::post('/sign-in', 'Auth\AdminLoginController@signIn')->name('admin.sign-in');
    Route::post('/send-forgot-password', 'Auth\AdminLoginController@sendForgotPassword')->name('admin.send-forgot-password');
    Route::post('/password/update', 'Auth\AdminLoginController@reset')->name('admin.password.update');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/home', 'AdminHomeController@index')->name('admin.home');
    Route::get('/user/clients', 'UserController@getClients')->name('user.client');
    Route::get('/user/administrators', 'UserController@getAdmin')->name('user.admin');
    Route::get('/orders', 'OrderController@index')->name('admin.order');
});
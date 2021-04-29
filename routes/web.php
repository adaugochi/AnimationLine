<?php

//use Illuminate\Support\Facades\Artisan;

Route::get('/', function () { return view('welcome');});
Route::get('/our-blog', 'UserBlogController@index')->name('blog');
Route::get('/our-blog/{key}', 'UserBlogController@showPost')->name('show.post');

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
Route::post('/save-billing-details', 'PricingController@saveBilling')->name('save-billing');
Route::get('/proceed-payment/{id}', 'PricingController@proceedToPayment')->name('proceed-payment');
Route::post('/save-payment', 'PricingController@savePayment')->name('save-payment');

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

Auth::routes(['verify' => true]);
Route::get('email/verify/{id}', 'Auth\VerificationController@emailVerify')->name('auth.email.verify');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order/{id}', 'HomeController@viewOrder')->name('order');
Route::post('/send-positive-review', 'HomeController@sendPositiveReview')->name('pos.review');
Route::post('/send-negative-review', 'HomeController@sendNegativeReview')->name('neg.review');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/submit-contact', 'ContactController@submitContact');

Route::prefix('admin')->group(function () {
    // Login routes
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/sign-in', 'Auth\AdminLoginController@signIn')->name('admin.sign-in');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // Portal routes
    Route::get('/home', 'AdminHomeController@index')->name('admin.home');
    Route::get('/user/clients', 'UserController@getClients')->name('user.clients');
    Route::get('/user/administrators', 'UserController@getAdmin')->name('user.admin');
    Route::get('/orders', 'OrderController@index')->name('admin.order');
    Route::get('/orders/brief/{id}', 'OrderController@viewBrief')->name('admin.brief');
    Route::get('/user/client/{id}/transactions', 'UserController@showClientTransactions')->name('client.transaction');
    Route::get('/contacts', 'AdminHomeController@getContacts')->name('admin.contacts');
    Route::get('/contacts/{id}', 'AdminHomeController@showContact')->name('admin.contact');
    Route::get('/reviews', 'AdminHomeController@getReviews')->name('admin.reviews');

    //Orders
    Route::post('/send-order', 'OrderController@complete')->name('complete');
    Route::post('/deliver-order', 'OrderController@deliver')->name('deliver');
    Route::get('/order/comments/{id}', 'OrderController@getComments')->name('order.comment');
    Route::get('/order/details/{id}', 'OrderController@showOrderDetails')->name('order.detail');
    Route::get('/send-reminder/{id}', 'OrderController@sendReminder')->name('brief-reminder');
    Route::get('/payment-reminder/{id}', 'OrderController@paymentReminder')->name('payment-reminder');

    //Blog
    Route::get('/blogs', 'BlogController@index')->name('admin.blogs');
    Route::get('/new-post', 'BlogController@newPost')->name('new.blog');
    Route::post('/save-post', 'BlogController@savePost')->name('save.post');
    Route::get('/edit-post/{key}', 'BlogController@editPost')->name('edit.post');
    Route::get('/view-post/{key}', 'BlogController@viewPost')->name('view.post');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
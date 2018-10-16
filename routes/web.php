<?php
// Admin Group Routes
Route::prefix('admin')->group(function (){
    Route::middleware('auth:admin')->group(function (){
        // Dashboard
        Route::get('/','DashboardController@index');
        // Products
        Route::resource('/products','ProductController');
        // Orders
        Route::resource('/orders','OrderController');
        Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
        Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
        // Users
        Route::resource('/users','UsersController');
        // logout
        Route::get('logout','AdminUserController@logout');
    });
    // Admin Login
        Route::get('/login','AdminUserController@index');
        Route::post('/login','AdminUserController@store');
});
// Front site Routes
Route::get('/','Front\HomeController@index');
Route::get('/user/register','Front\RegistrationController@index');
Route::post('/user/register','Front\RegistrationController@store');
Route::get('/user/profile','Front\UserProfileController@index');
Route::get('/user/login','Front\SessionsController@index');
Route::post('/user/login','Front\SessionsController@store');
Route::get('/user/logout','Front\SessionsController@logout');
Route::get('/user/order/{id}','Front\UserProfileController@show');


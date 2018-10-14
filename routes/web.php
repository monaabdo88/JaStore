<?php
Route::get('/','DashboardController@index');
Route::resource('/products','ProductController');
Route::resource('/orders','OrderController');
Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
// Users
Route::resource('/users','UsersController');

<?php
Route::get('/','DashboardController@index');
Route::resource('/products','ProductController');
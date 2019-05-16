<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index');
Route::resource('/user', 'UserController');
Route::resource('/page', 'PageController');
Route::get('/json/page', 'PageController@getJSON');
Route::resource('/category', 'CategoryController');
Route::get('/category/{id}/restore', 'CategoryController@restore');
Route::post('/category/{id}/restore', 'CategoryController@restore');
Route::resource('/product', 'ProductController');
Route::get('/product/{id}/restore', 'ProductController@restore');
Route::post('/product/{id}/restore', 'ProductController@restore');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WelcomeController@index');

Route::resource('category','CategoryController');
Route::get('parent_category','CategoryController@parent_category')->name('parent-category');
Route::resource('post','PostController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

//category
Route::resource('category','CategoryController');
Route::get('parent_category','CategoryController@parent_category')->name('parent-category');
Route::get('subcategory/{id}','CategoryController@sub_category');
Route::get('published-category/{id}','CategoryController@publish_category');
Route::get('unpublished-category/{id}','CategoryController@unpublish_category');
//post
Route::resource('posts','PostController');
Route::get('published-post/{id}','PostController@publish_post');
Route::get('unpublished-post/{id}','PostController@unpublish_post');
//gallery
Route::resource('galleries','GalleryController');
Route::get('published-gallery/{id}','GalleryController@publish_gallery');
Route::get('unpublished-gallery/{id}','GalleryController@unpublish_gallery');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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


/*FrontEnd
 * ================================
*/
Route::get('/','WelcomeController@index');
Route::get('/category-page/{id}','PageController@show');
Route::get('/post-page/{id}','PageController@post_show');

Route::post('any-query','WelcomeController@any_query')->name('any-query');

Route::get('/gallery',function (){
   return view('pages.gallery_page');
});

Route::get('/food',function (){
    return view('pages.food');
});

Route::get('/test/{id}',function ($id){
    $service= App\Category::where('parent_category',$id)->with('us')->get();
dd($service);
});
/*Admin panel/Backend
 * ===========================================
 */
//category
Route::resource('category','CategoryController');
Route::get('parent_category','CategoryController@parent_category')->name('parent-category');
Route::get('subcategory/{id}','CategoryController@sub_category');//for subcategory search
Route::get('sub-subcategory/{id}','CategoryController@sub_subcategory');//for sub subcategory search
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
//gallery post
Route::resource('gposts','GalleryPostController');
Route::get('published-gpost/{id}','GalleryPostController@publish_galleryPost');
Route::get('unpublished-gpost/{id}','GalleryPostController@unpublish_galleryPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

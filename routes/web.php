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
//posts
Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{id}', 'PostsController@show');
Route::post('/posts/store', 'PostsController@store');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::put('/posts/{id}', 'PostsController@update');
Route::delete('/posts/{id}', 'PostsController@destroy');

//tags
Route::get('/posts/tags/{tag}', 'TagsController@index');
Route::get('/tags/{id}', 'TagsController@show');
Route::post('/tags/store', 'TagsController@store');
Route::get('/tags/{id}/edit', 'TagsController@edit');
Route::put('/tags/{id}', 'TagsController@update');
Route::delete('/tags/{id}', 'TagsController@destroy');

//categories
Route::get('/posts/categories/{category_id}', 'CategoriesController@index');
Route::get('/categories/{id}', 'CategoriesController@show');
Route::post('/categories/category/store', 'CategoriesController@store');
Route::get('/categories/category/create', 'CategoriesController@create');
Route::get('/categories/{id}/edit', 'CategoriesController@edit');
Route::delete('/categories/{id}', 'CategoriesController@destroy');
Route::put('/categories/category/{id}', 'CategoriesController@update');
//Route::resource('categories', 'CategoriesController');

//comments
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/comments/{id}', 'CommentsController@show');

Route::view('login', 'auth.signin');
Route::view('register', 'auth.reg');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', 'PostsController@index');
});
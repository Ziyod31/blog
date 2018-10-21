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

//categories
Route::get('/posts/categories/{category}', 'CategoriesController@index');
Route::get('/categories/{id}', 'CategoriesController@show');
Route::post('/categories/store', 'CategoriesController@store');
Route::get('/categories/create', 'CategoriesController@create');
Route::get('/categories/{id}/edit', 'CategoriesController@edit');
Route::delete('/categories/{id}', 'CategoriesController@destroy');
//Route::resource('categories', 'CategoriesController');

//comments
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::view('login', 'auth.signin');
Route::view('register', 'auth.reg');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::view('/', 'dashboard.index');
});
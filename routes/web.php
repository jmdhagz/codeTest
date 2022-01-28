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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('posts/', 'PostController@index');
Route::get('posts/create', 'PostController@getCreate');
Route::post('posts/create', 'PostController@postCreate');
Route::get('posts/{id}/edit', 'PostController@getPost');
Route::post('posts/{id}/edit', 'PostController@postEdit');
Route::get('posts/{id}/delete', 'PostController@getDelete');
Route::post('posts/{id}/delete', 'PostController@postDelete');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
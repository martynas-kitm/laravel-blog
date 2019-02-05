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

Route::get('/','PublicPostController@index');
Route::get('/naujas','PostController@renderForm');
Route::post('/publish','PostController@store');
Route::get('/post/{post}','PublicPostController@showPost');
Route::get('/post/{post}/edit', 'PostController@postEdit');
Route::patch('/post/{post}', 'PostController@postUpdateStore');
Route::get('/post/{post}/delete', 'PostController@deletePost');
Route::post('/post/{post}/comment', 'CommentController@addComment');


Auth::routes();

Route::get('/admin', 'HomeController@index');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


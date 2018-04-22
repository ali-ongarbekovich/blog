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
Auth::routes();
Route::get('/', 'WelcomeController@index');


Route::get('/home', 'PostController@index'); // Main Page
Route::get('/user/{user_id}', 'PostController@profile'); // Main Page
Route::get('/create', 'PostController@create'); // Create
Route::get('/edit/{id}', 'PostController@edit'); // Editor

Route::post('/add', 'PostController@add'); // Post new Post :)
Route::post('/update/{id}', 'PostController@update'); // Update existing post
Route::get('/delete/{id}', 'PostController@delete'); // Remove existing post

Route::post('/upload', 'PostController@addPicture');
Route::post('/remove', 'PostController@removePicture');

Route::post('/like/{post_id}', 'ActionController@like');
Route::post('/dislike/{post_id}', 'ActionController@dislike');
Route::post('/comment', 'ActionController@addComment');
Route::get('/comment/{comment_id}', 'ActionController@removeComment');
Route::post('/repost', 'ActionController@addRepost');
Route::get('/repost/{repost_id}', 'ActionController@removeRepost');

Route::get('/comments/{post_id}', 'ActionController@getComments');

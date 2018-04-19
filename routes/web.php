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
Route::get('/create', 'PostController@create'); // Create
Route::get('/edit/{id}', 'PostController@edit'); // Editor

Route::post('/add', 'PostController@add'); // Post new Post :)
Route::post('/update/{id}', 'PostController@update'); // Update existing post
Route::post('/delete/{id}', 'PostController@remove'); // Remove existing post

Route::post('/upload', 'PostController@addPicture');
Route::post('/remove', 'PostController@removePicture');
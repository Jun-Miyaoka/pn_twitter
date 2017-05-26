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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('home', 'HomeController');
Route::post('/follow/{id}', 'HomeController@follow');
Route::get('/comment/{id}', 'CommentController@comment');
Route::post('/post/comment/{id}', 'CommentController@store');
Route::post('/comment/{id}', 'CommentController@destroy');

Route::get('/tweet/{id}', 'TweetController@show');
Route::post('/tweet/{id}', 'TweetController@destroy');

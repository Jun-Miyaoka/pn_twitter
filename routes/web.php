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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/posts', 'HomeController@store');
Route::post('/follow/{id}', 'HomeController@follow');
Route::get('/tweet', 'TweetController@tweet');
Route::get('/user/tweet/{id}', 'TweetController@user_tweet');
Route::get('/follow/tweet/{id}', 'TweetController@follower_tweet');
Route::post('/user/tweet/{id}', 'TweetController@destroy');

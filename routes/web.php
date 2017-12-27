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
})->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('add');

Route::get('/gallery/{catagory}', 'ArtController@gallery')->name('gallery');

Route::get('/picture/{id}', 'ArtController@picture')->name('picture');

Route::get('/addPicture', 'ArtController@addPicture')->name('addPicture');

Route::post('/add', 'ArtController@add')->name('add');

Route::get('/like/{id}', 'LikesController@like')->name('like');

Route::get('/dislike/{id}', 'LikesController@dislike')->name('dislike');

Route::post('/search', 'ArtController@search')->name('search');

Route::post('/searchPage', 'ArtController@searchPage')->name('searchPage');

Route::get('/viewLikes', 'ArtController@viewLikes')->name('viewLikes');

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

Route::get('/password', function() {
    return view('auth.changepass');
});

Route::get('/password', 'PasswordController@index');
Route::put('/password', 'PasswordController@edit');

Route::get('/post', 'PostController@index');
Route::post('/post', 'PostController@store');

Route::get('/favorite', 'FavoritePostController@index');
Route::post('/favorite', 'FavoritePostController@store');




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

// Laravel auth scaffolding
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function() { return view('post.index'); })->name('home');

    Route::get('/password', function() {
        return view('auth.changepass');
    });

    Route::get('/password', 'PasswordController@index');
    Route::put('/password', 'PasswordController@edit');
    
    // API a partir daqui

    Route::get('/post', 'PostController@index');
    Route::post('/post', 'PostController@store');
    
    // Route::get('/favorite', 'FavoritePostController@index');
    Route::post('/favorite', 'FavoritePostController@store');
});

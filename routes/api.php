<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'PassportController@login');
Route::post('/signup', 'PassportController@signup');

Route::group([
    'middleware' => 'auth:api'
    ], function() {
        Route::get('/logout', 'PassportController@logout');
        Route::get('/user', 'PassportController@user');

        Route::get('/post', 'PostController@index');
        Route::post('/post', 'PostController@store');
        
        Route::get('/favorite', 'FavoritePostController@index');
        Route::post('/favorite', 'FavoritePostController@store');
});

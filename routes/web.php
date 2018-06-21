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

// Login/Registration Handling
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// Main
Route::group(['middleware' => ['auth']], function () {
    Route::resource('shops', 'ShopsController', ['only' => ['create','show']]);
    Route::post('favorite', 'ShopUserController@favorite')->name('favorite');
    Route::delete('favorite', 'ShopUserController@unfavorite')->name('favorite');
});

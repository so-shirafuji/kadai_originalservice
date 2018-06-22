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
// inChargeOf: girls
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
// inChargeOf: girls
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// inChargeOf: girls
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// inChargeOf: girls
Route::post('login', 'Auth\LoginController@login')->name('login.post');
// inChargeOf: girls
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// Main
// inChargeOf: girls
Route::get('/', 'WelcomeController@index')->name('welcome.index');


// Route::group(['middleware' => ['auth']], function () {



Route::group(['middleware' => ['auth']], function () {

    // inChargeOf: guys
    Route::resource('shops', 'ShopsController', ['only' => ['create', 'show', 'store']]);
    // inChargeOf: guys
    Route::post('favorite', 'ShopUserController@favorite')->name('favorite');
    // inChargeOf: guys
    Route::delete('favorite', 'ShopUserController@unfavorite')->name('unfavorite');
    // inChargeOf: girls
    Route::resource('user', 'UsersController', ['only' => ['show']]);
 });

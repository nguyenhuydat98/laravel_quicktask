<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'localization'], function() {
    Route::get('lang/{language}', 'LocalizationController@changeLanguage')->name('change-language');
    Route::get('home', 'HomeController@index');
    Route::resource('users', 'UserController')->except(['show']);
    Route::resource('products', 'ProductController')->except(['index', 'show']);
    Route::get('list/{id}', 'ProductController@findByIdUser')->name('products.list');
});

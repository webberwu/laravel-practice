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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/astros/{astro}', 'AstroController@show')->middleware('auth')->name('astro.show');

Route::get('/google/login', 'Auth\LoginController@redirectToGoogleProvider')->name('google.login');
Route::get('/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');

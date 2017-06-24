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

Route::get('/', 'HomeController@index');

Route::get('/ads/newadform', 'AdController@newadform')->name('newadform')->middleware('auth');

Route::post('/ads/newad', 'AdController@newad')->name('newad')->middleware('auth');

Route::get('/ads/afterlogin','LogController@index');

Route::get('/ads','AdController@showall')->name('ads');

Route::get('/ads/my', 'AdController@showmyads')->name('myads')->middleware('auth');

Route::get('/ads/{id}', 'AdController@show')->name('ad')->middleware('auth');

Route::post('/ads','AdController@showall')->name('adspost');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/location', 'LocationController@setsession');

//zmiana hasla
Route::get('/changepassword', 'Auth\ChangePasswordController@password')->name('changepassword')->middleware('auth');
Route::post('/updatepassword', 'Auth\ChangePasswordController@updatePassword');


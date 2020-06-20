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

Route::get('/', 'HomeController@index');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('edit-profile');
Route::post('/profile/update/{id}', 'ProfileController@update')->name('update');
Route::post('/profile/create/{id}', 'ProfileController@create')->name('add-video');
Route::post('/profile/delete/{video}', 'ProfileController@delete')->name('video-delete');

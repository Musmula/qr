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
    return redirect('/home');
});

Auth::routes();

// Navigation routes
Route::get('/home', 'HomeController@index');
Route::get('/web', 'HomeController@web');
Route::get('/text', 'HomeController@text');
Route::get('/vcard', 'HomeController@vcard');
Route::get('/location', 'HomeController@location');
Route::get('/email', 'HomeController@email');
Route::get('/wifi', 'HomeController@wifi');
Route::get('/about', 'HomeController@about');

// Profile routes
Route::get('/profile', 'ProfileController@show');
Route::patch('/profile', 'ProfileController@update');
Route::patch('/profile/password', 'ProfileController@password');

// Generation routes
Route::post('/dynamic', 'QrController@generate');
Route::get('/{QrCodeLink}', 'QrController@redirect');
Route::post('/download', 'QrController@download');
Route::post('/{QrCodeLink}/update', 'QrController@update');
Route::delete('/{QrCodeLink}', 'QrController@drop');

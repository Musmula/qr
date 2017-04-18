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
Route::get('/generate/web', 'HomeController@web');
Route::get('/generate/text', 'HomeController@text');
Route::get('/generate/vcard', 'HomeController@vcard');
Route::get('/generate/location', 'HomeController@location');
Route::get('/generate/email', 'HomeController@email');
Route::get('/generate/wifi', 'HomeController@wifi');

// Generation routes
Route::post('/generate/dynamic', 'QrController@generate');
Route::get('/dynamic/{QrCodeLink}', 'QrController@redirect');
Route::post('/dynamic/{QrCodeLink}/update', 'QrController@update');
Route::delete('/dynamic/{QrCodeLink}', 'QrController@drop');

// Profile routes
Route::get('/profile', 'ProfileController@show');
Route::patch('/profile', 'ProfileController@update');
Route::patch('/profile/password', 'ProfileController@password');
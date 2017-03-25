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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/generate/web', 'HomeController@web');
Route::get('/generate/text', 'HomeController@text');
Route::get('/generate/vcard', 'HomeController@vcard');
Route::get('/generate/location', 'HomeController@location');
Route::get('/generate/email', 'HomeController@email');
Route::get('/generate/wifi', 'HomeController@wifi');

Route::post('/generate/dynamic', 'QrController@generate');

Route::get('/dynamic/{QrCodeLink}', 'QrController@redirect');

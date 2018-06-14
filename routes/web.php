<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|http://localhost/api/representativeapi
*/

Route::get('/', function () {
    return view('main.home');
});

Auth::routes();
Route::resource('representative', 'RepresentativeapiController');


Route::get('/home', 'HomeController@index')->name('home');

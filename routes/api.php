<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('representativeapi', 'RepresentativeapiController');
Route::resource('transactionapi', 'TransactionsController');
Route::get('/representativescbx', 'RepresentativescbxController@index')->name('representativescbx');
Route::get('/concentrates', 'ConcentratesController@index')->name('concentrates');

//http://localhost/api/transactionapi



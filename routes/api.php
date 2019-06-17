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

Route::get('/db_connection','Api\StatusController@db_connection');
Route::get('user','Api\UserController@index');
Route::get('user/{id}','Api\UserController@index');
Route::post('user/create','Api\UserController@create');
Route::put('user/update/{id}','Api\UserController@update');
Route::delete('user/delete/{id}','Api\UserController@delete');

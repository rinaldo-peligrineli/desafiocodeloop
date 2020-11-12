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

Route::post('/estudante/create', 'EstudanteController@store');
Route::get('/estudante/edit/{id}', 'EstudanteController@edit');
Route::get('/estudante/update/{id}', 'EstudanteController@update');
Route::get('/estudante/delete/{id}', 'EstudanteController@delete');
Route::get('/estudante/list', 'EstudanteController@index'); 

Route::get('getSeriesIngresso', 'APIController@getSeriesIngresso');


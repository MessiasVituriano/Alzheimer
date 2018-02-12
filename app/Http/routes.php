<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/api/v1/usuarios', 'usuarioController@index');
Route::post('/api/v1/usuarios', 'usuarioController@store');
Route::post('/api/v1/usuarios/{id}', 'usuarioController@update');
Route::get('/api/v1/usuarios/{id}', 'usuarioController@show');
Route::delete('/api/v1/usuarios/{id}', 'usuarioController@destroy');
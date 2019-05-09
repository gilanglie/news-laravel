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
// api
Route::get('/api/article', 'ApiController@index');
Route::get('/api/article/{id}', 'ApiController@show');
Route::post('/api/article', 'ApiController@store');
Route::put('/api/article/{id}', 'ApiController@update'); 
Route::delete('/api/article/{id}', 'ApiController@delete');
// api get weather
Route::get('/api/weather/{data}', 'ApiController@getWeather');
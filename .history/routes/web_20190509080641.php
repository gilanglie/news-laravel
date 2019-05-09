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

Route::get('/', 'MainController@index');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
// crud 
Route::get('/article/{id}', 'ArticleController@index');
Route::post('/article/add', 'ArticleController@add');
Route::post('/article/update/{id}', 'ArticleController@update');
Route::get('/article/delete/{id}', 'ArticleController@delete');

// api
Route::get('/api/article', 'ApiController@index');
Route::get('/api/article/{id}', 'ApiController@show');
Route::post('/api/article', 'ApiController@store');
Route::put('/api/article/{id}', 'ApiController@update'); 
Route::delete('/api/article/{id}', 'ApiController@delete');
// api get weather
Route::get('/api/weather/{data}', 'ApiController@getWeather');
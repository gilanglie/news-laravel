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
Route::get('/article', 'ArticleController@index');
Route::get('/article/{id}', 'ArticleController@show');
Route::post('/article/add', 'ArticleController@store');
Route::post('/article/{id}', 'ArticleController@update'); 
Route::get('/article/{id}', 'ArticleController@delete');

Route::group(array('prefix'=>'api'),function(){
	Route::resource('article','ApiController',array('except'=>array('create','update')));
});

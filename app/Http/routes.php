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

Route::get('/','ArticleController@index');
Route::get('/article/{id}','ArticleController@show');



/* backend */
Route::group(['prefix'=>'backend','middleware'=>'auth'], function(){
    Route::any('/', 'backend\HomeController@index');
    Route::resource('/home','backend\HomeController');
    Route::resource('/user','backend\UserController');
    Route::get('/content','backend\ContentController@index');
    Route::resource('/article','backend\ArticleController');
});
Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');
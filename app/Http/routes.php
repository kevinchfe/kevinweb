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
    Route::resource('/cate','backend\CateController');
});
Route::get('/auth/login','Auth\AuthController@getLogin');
Route::post('/auth/login','Auth\AuthController@postLogin');

//重置密码
Route::get('/password/email','Auth\PasswordController@getEmail');
Route::post('/password/email','Auth\PasswordController@postEmail');

//Route::get('/password/reset/','Auth\PasswordController@getReset');
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset','Auth\PasswordController@postReset');
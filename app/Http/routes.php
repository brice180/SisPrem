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
    return view('welcome');
});

Route::get('/home', [
	'middleware' => 'auth',
	'uses' => 'HomeController@index',
	'as'   => 'home'
	]);

// Authentication routes...
Route::get('login', [    
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'login'
	]); 

Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
	'uses' =>'Auth\AuthController@getLogout',
	'as'  => 'logout'
	]);

// Registration routes...
Route::get('registro', [
	'uses' => 'Auth\AuthController@getRegister',
	'as'   => 'registro'
	]);

Route::post('registro', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

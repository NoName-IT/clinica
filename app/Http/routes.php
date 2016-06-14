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

/*
Route::get('/', function () {
    return view('welcome');
});

*/

// este es para hacer todas las rutas de auth controller
//Route::auth();

// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// Generamos la ruta / con el nombre dashboard para luego obtener una url dinamica desde js
Route::get('/', [
		'as' => 'dashboard',
		'uses' => 'HomeController@index'
	]);

//Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function (){

	Route::resource('users', 'Admin\UserController');
	
});

Route::resource('patients', 'Patient\PatientController');
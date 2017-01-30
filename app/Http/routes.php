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

Route::group(['prefix' => 'admin'], function (){

	Route::resource('users', 'Admin\UserController');

	Route::resource('medic_types', 'Admin\MedicTypeController');

	Route::resource('blood_types', 'Admin\BloodTypeController');

	Route::resource('civil_statuses', 'Admin\CivilStatusController');

	Route::resource('dni_types', 'Admin\DniTypeController');

	Route::resource('relationships', 'Admin\RelationshipController');

	Route::resource('discharge_types', 'Admin\DischargeTypeController');

});

Route::resource('internments', 'Internment\InternmentController');

Route::resource('patients', 'Patient\PatientController');


Route::post( 'internments/confirm',	 ['as' => 'internmentConfirm',
			 'uses' => 'Internment\InternmentController@confirm']);

Route::post( 'internments/witness',	 ['as' => 'witnessCreate',
			 'uses' => 'Internment\InternmentController@witness']);

Route::resource('witnesses', 'Witness\WitnessController');

Route::resource('coinsurances', 'Coinsurance\CoinsuranceController');

Route::resource('medical_insurances', 'MedicalInsurance\MedicalInsuranceController');

Route::resource('medics', 'Medic\MedicController');

Route::get('pdf', 'PdfController@invoice');

Route::get('find/{clase}/{campo}/{completo}', 'FindController@find');
Route::get('city/find', 'Address\CityController@find');
Route::get('city/getCity/{id}', 'Address\CityController@getCity');

//Rutas para el Storage de archivos
Route::resource('storage', 'StorageController');
Route::get('storage/formulario', 'StorageController@index');

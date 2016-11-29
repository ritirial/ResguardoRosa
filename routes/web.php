<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware'=>'auth'], function() { //Función de autenticación

	Route::get('/admin', 'HomeController@index')->name('/admin');

	Route::get('/home', function() {
		return redirect()->route('/admin');
	});

	Route::resource('actividades', 'ActividadController');

	Route::resource('avisos', 'AvisoController');

	Route::resource('donantes', 'DonanteController');

	Route::resource('fotosactividades', 'FotoActividadController');

	Route::resource('integrantes', 'IntegranteController');

	Route::resource('secciones', 'SeccionController');

	Auth::routes();

	Route::get('logout', function(){
		Auth::logout();
		return redirect()->route('/admin');
	})->name('logout');

});

Auth::routes();

Route::resource('/', 'ResguardoController');
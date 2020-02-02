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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('send/license', 'LicenseController@sendLicense')->name('send.license');
Route::get('solicitar/carnet', 'LicenseController@soliStudent');

// Estudiante
Route::get('estudiante/search/{id}', 'LicenseController@searchStudent');
Route::get('estudiante/mostrar/{id}', 'StudentController@edit');
Route::get('estudiante/foto/{id}', 'StudentController@searchPhoto')->name('estudiante.searchPhoto');
Route::get('estudiante/editar/{id}', 'StudentController@searchStudentInfo')->name('estudiante.searchInfo');
Route::resource('estudiante', 'StudentController');
Route::get('prueba','StudentController@prueba');
// Estudiante

// Usuarios
Route::get('admin/bitacora','BitacoraController@index')->name('usuario.bitacora');
Route::get('admin/estadisticas','UserController@statisticsAll')->name('usuario.statistics');
	//reportes 
Route::get('admin/reportes', 'ReportController@index')->name('report.index');
Route::post('admin/reportes/download', 'ReportController@download')->name('report.download');
	//reportes 
Route::get('admin/usuarios','UserController@index')->name('usuario.all');
Route::post('admin/usuarios/nuevo','UserController@store')->name('usuario.new');
Route::get('admin/usuarios/editar/{id}','UserController@edit')->name('usuario.edit');
Route::put('admin/usuarios/actualizar/{id}','UserController@edit')->name('usuario.actualizar');
Route::delete('admin/usuarios/eliminar/{id}','UserController@destroy')->name('usuario.destroy');
// Usuarios


// ABRIR VENTANA EMERGENTE PARA TOMAR LA FOTO
Route::get('popUp/webcam', function() {
    return view('webcam.index');
})->name('webcam.open');
// ABRIR VENTANA EMERGENTE PARA TOMAR LA FOTO

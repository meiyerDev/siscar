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

Route::post('send/license', 'StudentController@sendLicense')->name('send.license');
Route::get('buscar/estudiante', 'StudentController@soliStudent');
Route::get('estudiante/mostrar/{id}', 'StudentController@edit');
Route::get('estudiante/foto/{id}', 'StudentController@searchPhoto')->name('estudiante.searchPhoto');
Route::get('estudiante/search/{id}', 'StudentController@searchStudent');
Route::resource('estudiante', 'StudentController');


// ABRIR VENTANA EMERGENTE PARA TOMAR LA FOTO
Route::get('popUp/webcam', function() {
    return view('webcam.index');
})->name('webcam.open');
// ABRIR VENTANA EMERGENTE PARA TOMAR LA FOTO

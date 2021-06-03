<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IngresoCompraController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ingresocompra', 'IngresoCompraController');

/* crud generator */  //agregar un middleware
/* Route::resource('ciudad', 'ciudadController'); */
Route::resource('ciudad', 'ciudadController');
Route::resource('departamento_af', 'departamento_afController');
Route::resource('empresa_af', 'empresa_afController');
Route::resource('item_af', 'item_afController');
Route::resource('calificacion_acti_af', 'calificacion_acti_afController');
/* Route::resource('marca_af', 'marca_afController'); */
Route::resource('marca_af', 'marca_afController');
Route::resource('modelo_af', 'modelo_afController');
Route::resource('sector_af', 'sector_afController');
Route::resource('sucursal_af', 'sucursal_afController');
Route::resource('area_af', 'area_afController');
Route::resource('turno_af', 'turno_afController');
Route::resource('responsable_af', 'responsable_afController');
Route::resource('tipo_resp_af', 'tipo_resp_afController');


/* crud generator */


 /* salidas */
 /* Route::resource('salidas_af', 'salidas_afController'); */
 Route::resource('salidas_transferencia', 'salidas_af\salida_transController');
/*  Route::get('salidas_prestamo', 'salidas_afController@index_prestamo');
 Route::get('salidas_mantenimiento', 'salidas_afController@index_mantenimiento');
 Route::get('salidas_bajas', 'salidas_afController@index_bajas'); */
 /* salidas */

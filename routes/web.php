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
Route::resource('almacen','ControladorAlmacen');
Route::resource('usuarios','ControladorUsuario');
Route::resource('local','ControladorLocal');
Route::get("login", "Controladorinicio@index");


Route::get('/', function () {
    return view('layouts.welcomeAdmi');
});

Route::bind('local', function ($idSucursal){
	return App\Local::where('idSucursal', $idSucursal)->first();
});
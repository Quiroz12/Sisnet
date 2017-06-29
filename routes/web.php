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
/*Route::get('dropdown', function(){
	$id = Input::get('option');
	$marca = Dtequipo::find($id)->marca;
	return $marca->lists('marca', 'id');
});*/

Route::resource('servicios','ControladorServicio');
Route::resource('ventas','ControladorVenta');
Route::resource('productos','ControladorProducto');
Route::resource('almacen','ControladorAlmacen');
Route::resource('usuarios','ControladorUsuario');
Route::resource('local','ControladorLocal');
//Route::get("login", "Controladorinicio@index");
Route::auth();

Route::get('/', function () {
    return view('auth/login');
});

Route::bind('local', function ($idSucursal){
	return App\Local::where('idSucursal', $idSucursal)->first();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('servicios', 'ControladorServicio');
    Route::get('get-marca-list','ControladorServicio@getMarcaList');
    Route::get('get-modelo-list','ControladorServicio@getModeloList');
    Route::get('get-falla-list','ControladorServicio@getFallayDemas');
    Route::get('get-costo-list','ControladorServicio@getCosto');
    Route::get('cotizar','ControladorServicio@cotizar');
});


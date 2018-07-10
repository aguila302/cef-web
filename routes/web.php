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
// Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    /* Rutas para autopistas. */
    Route::get('inicio', 'HomeController@index')->name('inicio');
    Route::get('autopistas', 'AutopistasController@index')->name('autopistas.index');
    Route::get('autopistas/registrar', 'AutopistasController@crear')->name('autopistas.crear');
    Route::post('autopistas', 'AutopistasController@guardar')->name('autopistas.guardar');
    Route::get('autopistas/{autopista}/actualizar', 'AutopistasController@actualizar')->name('autopistas.actualizar');
    Route::patch('autopistas/{autopista}', 'AutopistasController@modificar')->name('autopistas.modificar');

    /* Rutas para usuarios. */
    Route::get('usuarios', 'UsuariosController@index')->name('usuarios.index');
    Route::get('usuarios/registrar', 'UsuariosController@crear')->name('usuarios.crear');
    Route::post('usuarios', 'UsuariosController@guardar')->name('usuarios.guardar');
    Route::get('usuarios/{usuario}/actualizar', 'UsuariosController@actualizar')->name('usuarios.actualizar');
    Route::patch('usuarios/{usuario}', 'UsuariosController@modificar')->name('usuarios.modificar');

    /* Rutas para asignar y quitar autopistas a un usuario. */
    Route::post('usuarios/{usuario}/actualizar', 'UsuarioAutopistasController@guardar')->name('usuario.autopistas.guardar');
    Route::delete('usuarios/{usuario}/autopistas/{autopista}', 'UsuarioAutopistasController@quitar')->name('usuario.autopistas.quitar');
});

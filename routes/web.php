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
    Route::get('autopistas/registrar', 'AutopistasController@crear')->name('autopistas.crear')->middleware('role:admin');
    Route::post('autopistas', 'AutopistasController@guardar')->name('autopistas.guardar')->middleware('role:admin');
    Route::get('autopistas/{autopista}/actualizar', 'AutopistasController@actualizar')->name('autopistas.actualizar')->middleware('role:admin');
    Route::patch('autopistas/{autopista}', 'AutopistasController@modificar')->name('autopistas.modificar')->middleware('role:admin');

    /* Rutas para usuarios. */
    Route::get('usuarios', 'UsuariosController@index')->name('usuarios.index');
    Route::get('usuarios/registrar', 'UsuariosController@crear')->name('usuarios.crear')->middleware('role:admin');
    Route::post('usuarios', 'UsuariosController@guardar')->name('usuarios.guardar')->middleware('role:admin');
    Route::get('usuarios/{usuario}/actualizar', 'UsuariosController@actualizar')->name('usuarios.actualizar')->middleware('role:admin');
    Route::patch('usuarios/{usuario}', 'UsuariosController@modificar')->name('usuarios.modificar')->middleware('role:admin');
    Route::delete('usuarios/{user}/eliminar', 'UsuariosController@destroy')->name('usuarios.delete')->middleware('role:admin');

    /* Rutas para asignar y quitar autopistas a un usuario. */
    Route::post('usuarios/{usuario}/actualizar', 'UsuarioAutopistasController@guardar')->name('usuario.autopistas.guardar');
    Route::delete('usuarios/{usuario}/autopistas/{autopista}', 'UsuarioAutopistasController@quitar')->name('usuario.autopistas.quitar');

    /* Rutas subrecursos de tramos. */
    Route::prefix('autopistas/{autopista}')->group(function () {
        Route::get('tramos', 'TramosController@index')->name('tramos.index');
        Route::get('tramos/registrar', 'TramosController@registrar')->name('tramos.registrar');
        Route::post('tramos', 'TramosController@guardar')->name('tramos.guardar');

        /* Rutas subrecursos de secciones. */
        Route::get('tramos/{tramo}/secciones', 'SeccionesController@index')->name('secciones.index');
        Route::get('tramos/{tramo}/secciones/registrar', 'SeccionesController@registrar')->name('secciones.registrar');
        Route::post('tramos/{tramo}/secciones', 'SeccionesController@guardar')->name('secciones.guardar');

        /* Rutas subrecursos de reportes. */
        Route::get('resumen', 'ResumenCalificacionController@index')->name('resumen.index');
        Route::get('resumen-por-tramo', 'ResumenCalificacionController@resumenPorTramo')->name('resumen-por-tramo');
        Route::post('resumen-por-tramo', 'ResumenCalificacionController@resumenPorTramo')->name('resumen-por-tramo');

    });
});

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

    /* Rutas para autopistas. */
    Route::get('usuarios', 'UsuariosController@index')->name('usuarios.index');
    Route::get('usuarios/registrar', 'UsuariosController@crear')->name('usuarios.crear');
    Route::post('usuarios', 'UsuariosController@guardar')->name('usuarios.guardar');
});

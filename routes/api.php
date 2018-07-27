<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->group(function () {
    Route::get('/usuario', 'Api\UsuarioController@obtenerUsuario');
    Route::get('/autopistas', 'Api\AutopistasController@obtenerAutopistas');

    /* Rutas subrecursos de tramos. */
    Route::prefix('autopistas/{autopista}')->group(function () {
        Route::get('/tramos', 'Api\TramosController@obtenerTramos');

        /* Rutas subrecursos de secciones. */
        Route::get('/tramos/{tramo}/secciones', 'Api\SeccionesController@obtenerSecciones');
    });

});

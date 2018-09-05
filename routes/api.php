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
    /* Rutas subrecursos de cuerpos. */
    Route::get('/cuerpos', 'Api\CuerposController@obtenerCuerpos');

    /* Rutas subrecursos de elementos generales de un camino. */
    Route::get('/elementos-generales-camino', 'Api\ElementosGeneralesCaminoController@obtenerElementosGeneralesCamino');

    /* Rutas subrecursos de valores ponderados. */
    Route::prefix('elementos-generales/{elementoGeneral}')->group(function () {
        Route::get('/valores-ponderados', 'Api\ValoresPonderadosController@obtenerValoresPonderados');
    });

    /* Rutas subrecursos de elementos. */
    Route::prefix('valores-ponderados/{valorPonderado}')->group(function () {
        Route::get('/elementos', 'Api\ElementosController@obtenerElementos');
    });

    /* Rutas subrecursos de factores elementos. */
    Route::prefix('elementos/{elemento}')->group(function () {
        Route::get('/factor', 'Api\FactorElementoController@obtenerfactores');

        /* Ruta para intensidades */
        Route::prefix('defectos/{defecto}')->group(function () {
            Route::get('/intensidades', 'Api\IntensidadesController@obtenerIntensidades');
        });

        /* Ruta para defectos */
        Route::get('/defectos', 'Api\DefectosController@obtenerDefectos');
    });

    /* Rutas subrecursos de rangos. */
    Route::prefix('defectos/{defecto}')->group(function () {
        Route::get('/rangos', 'Api\RangosController@obtenerRangos');
    });

});

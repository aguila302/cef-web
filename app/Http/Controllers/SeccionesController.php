<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Seccion;
use App\Tramo;
use Illuminate\Http\Request;

class SeccionesController extends Controller
{
    /**
     * Muestra un listado de secciones por tramo y por autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Autopista $autopista, Tramo $tramo)
    {
        /* Obtener secciones de un tramos en el origen de datos. */
        $secciones = $tramo->secciones()->get();

        return view('secciones.index', [
            'autopista' => $autopista,
            'tramo'     => $tramo,
            'secciones' => $secciones,
        ]);
    }

    /**
     * Muestra un formulario para registrar una seccion de un tramo.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar(Autopista $autopista, Tramo $tramo)
    {

        $longitudSecciones            = 0;
        $cadenamientoInicialAutopista = intval($tramo->cadenamiento_inicial_km . $tramo->cadenamiento_inicial_m);
        $cadenamientoFinalAutopista   = intval($tramo->cadenamiento_final_km . $tramo->cadenamiento_final_m);
        $sumaDeSecciones              = 0;

        /* Obtener longitudes totales de las secciones de un tramo. */
        $longitudInicial = $tramo->secciones->map(function ($item) {
            return intval(($item->cadenamiento_final_km . $item->cadenamiento_final_m) - ($item->cadenamiento_inicial_km . $item->cadenamiento_inicial_m));
        })->sum();

        $sumaDeSecciones = $cadenamientoInicialAutopista + $longitudInicial;

        if ($cadenamientoFinalAutopista === $sumaDeSecciones) {
            flash('Ya no puedes registrar mas secciones en este tramo.')->important();
            return redirect()->route('secciones.index', [$autopista, $tramo]);
        }

        /* Obtener ultimo tramo registrado de una autopista. */
        $ultimaSeccion = $tramo->secciones()->orderBy('id', 'DESC')->first();
        // dd($ultimaSeccion);

        return view('secciones.crear', [
            'autopista'     => $autopista,
            'tramo'         => $tramo,
            'ultimaSeccion' => $ultimaSeccion,
        ]);
    }

    /**
     * Guarda una seccion de un tramo y de una autopista en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request, Autopista $autopista, Tramo $tramo)
    {
        /* Obteber ultimo seccion para un tramos. */
        $secciones = $tramo->secciones()->orderBy('id', 'DESC')->first();

        if ($secciones) {
            $cadenamientoFinalTramo         = intval($tramo->cadenamiento_final_km . $tramo->cadenamiento_final_m);
            $cadenamientoInicialUltimoTramo = intval($request->cadenamiento_inicial_km . $request->cadenamiento_inicial_m);
            $ultimaLongitudNuevoTramo       = $cadenamientoFinalTramo - $cadenamientoInicialUltimoTramo;

            if ($ultimaLongitudNuevoTramo < 10000) {
                $request->validate([
                    'cadenamiento_final_km' => 'required|numeric|min:' . $tramo->cadenamiento_final_km . '|max:' . $tramo->cadenamiento_final_km . '|between:000,999',
                    'cadenamiento_final_m'  => 'required|numeric|digits:3|max:' . $tramo->cadenamiento_final_m . '',
                ]);
            } else {

                $request->validate([
                    'cadenamiento_final_km' => 'required|numeric|min:' . ($secciones->cadenamiento_final_km + 10) . '|max:' . ($secciones->cadenamiento_final_km + 10) . '|digits_between:000,999',
                    'cadenamiento_final_m'  => 'required|numeric|digits:3',
                ]);
            }
        } else {

            /* No hay secciones registrados para un tramo. */
            /* Validar datos del formulario. */
            $request->validate([
                'cadenamiento_inicial_km' => 'required|numeric|min:' . $tramo->cadenamiento_inicial_km . '|max:' . $tramo->cadenamiento_inicial_km . '|between:000,999',
                'cadenamiento_inicial_m'  => 'required|numeric|min:' . $tramo->cadenamiento_inicial_m . '|max:' . $tramo->cadenamiento_inicial_m . '|digits:3',
                'cadenamiento_final_km'   => 'required|numeric|min:' . ($tramo->cadenamiento_inicial_km + 10) . '|max:' . ($tramo->cadenamiento_inicial_km + 10) . '|between:' . $tramo->cadenamiento_inicial_km . ',999',
                'cadenamiento_final_m'    => 'required|numeric|digits:3',
            ]);
        }
        /* Obtener la distancia de la sección a registrar. */
        $longitudValidaSeccion = intval($request->cadenamiento_final_km . $request->cadenamiento_final_m) - intval($request->cadenamiento_inicial_km . $request->cadenamiento_inicial_m);

        /* Validar la sección que cumpla con la distancia de 10 km. */
        if ($longitudValidaSeccion > 10000) {
            flash('La sección no tiene la longitud correcta.')->warning();
            return redirect()->route('secciones.registrar', [$autopista, $tramo]);
        }

        $request['autopista_id'] = $autopista->id;
        $request['tramo_id']     = $tramo->id;

        /* Crea tramo en el origen de datos. */
        Seccion::crearSeccion($request->all());

        flash('La sección se registro correctamente.')->important();
        return redirect()->route('secciones.index', [$autopista, $tramo]);
    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        //
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        //
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {
        //
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        //
    }
}

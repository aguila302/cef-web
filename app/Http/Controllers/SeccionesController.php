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

        /* Obtener ultimo tramo registrado de una autopista. */
        $ultimaSeccion = $tramo->secciones()->orderBy('id', 'DESC')->first();

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
            $request->validate([
                'cadenamiento_final_km' => 'required|numeric|min:' . $autopista->cadenamiento_final_km . '|max:' . $autopista->cadenamiento_final_km . '|digits_between:000,999',
                'cadenamiento_final_m'  => 'required|numeric|max:' . $autopista->cadenamiento_final_m . '|digits_between:000,999',
            ]);
        } else {
            /* No hay secciones registrados para un tramo. */
            dd(substr($request->cadenamiento_inicial_km, -1));

            // $request->validate([
            //     'cadenamiento_inicial_km' => 'required|numeric|min:' . $tramo->cadenamiento_inicial_km . '|max:' . $tramo->cadenamiento_inicial_km . '|digits:3',
            //     'cadenamiento_inicial_m'  => 'required|numeric|min:' . $tramo->cadenamiento_inicial_m . '|max:' . $tramo->cadenamiento_inicial_m . '|digits:3',
            //     'cadenamiento_final_km'   => 'required|numeric|min:' . ($tramo->cadenamiento_inicial_km + 10) . '|max:' . ($tramo->cadenamiento_inicial_km + 10) . '|digits:3',
            //     // 'cadenamiento_final_m'    => 'required|numeric|max:' . $autopista->cadenamiento_final_m . '|digits:3',
            // ]);
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

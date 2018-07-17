<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Tramo;
use Illuminate\Http\Request;

class TramosController extends Controller
{
    /**
     * Muestra un listado de tramos de una autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Autopista $autopista)
    {
        $tramos = $autopista->tramos()->get();

        return view('tramos.index', [
            'autopista' => $autopista,
            'tramos'    => $tramos,
        ]);
    }

    /**
     * Muestra un formulario para registrar un tramo de una autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar(Autopista $autopista)
    {

        $longitudTramos               = 0;
        $cadenamientoInicialAutopista = intval($autopista->cadenamiento_inicial_km . $autopista->cadenamiento_inicial_m);
        $cadenamientoFinalAutopista   = intval($autopista->cadenamiento_final_km . $autopista->cadenamiento_final_m);
        $sumaDeTramos                 = 0;

        /* Obtener longitudes totales de los tramos de una autopista. */
        $longitudInicial = $autopista->tramos->map(function ($item) {
            return intval(($item->cadenamiento_final_km . $item->cadenamiento_final_m) - ($item->cadenamiento_inicial_km . $item->cadenamiento_inicial_m));
        })->sum();

        $sumaDeTramos = $cadenamientoInicialAutopista + $longitudInicial;

        if ($cadenamientoFinalAutopista === $sumaDeTramos) {
            flash('Ya no puedes registrar mas tramos en esta autopista.')->important();
            return redirect()->route('tramos.index', [$autopista]);
        }

        /* Obtener ultimo tramo registrado de una autopista. */
        $ultimoTramo = $autopista->tramos()->orderBy('id', 'DESC')->first();
        return view('tramos.crear', [
            'autopista'   => $autopista,
            'ultimoTramo' => $ultimoTramo,
        ]);
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function guardar(Request $request, Autopista $autopista)
    {

        /* Verifica si actualmente hay tramos registrados para un autopista. */
        $tramos = $autopista->tramos()->orderBy('id', 'DESC')->first();
        if ($tramos) {
            $request->validate([
                'cadenamiento_inicial_km' => 'required|numeric|min:' . $tramos->cadenamiento_final_km . '|max:' . $tramos->cadenamiento_final_km . '|digits_between:000,999',
                'cadenamiento_inicial_m'  => 'required|numeric|min:' . $tramos->cadenamiento_final_m . '|max:' . $tramos->cadenamiento_final_m . '|digits:3',
                'cadenamiento_final_km'   => 'required|numeric|min:' . $tramos->cadenamiento_final_km . '|max:' . $autopista->cadenamiento_final_km . '|digits_between:000,999',
                'cadenamiento_final_m'    => 'required|numeric|max:' . $autopista->cadenamiento_final_m . '|digits:3',
            ]);
        } else {
            /* No hay tramos registrados para una autopista. */
            $request->validate([
                'cadenamiento_inicial_km' => 'required|numeric|min:' . $autopista->cadenamiento_inicial_km . '|max:' . $autopista->cadenamiento_inicial_km . '|digits_between:000,999',
                'cadenamiento_inicial_m'  => 'required|numeric|max:' . $autopista->cadenamiento_inicial_m . '|digits:3',
                'cadenamiento_final_km'   => 'required|numeric|min:' . $request->cadenamiento_inicial_km . '|max:' . $autopista->cadenamiento_final_km . '|digits_between:000,999',
                'cadenamiento_final_m'    => 'required|numeric|max:' . $autopista->cadenamiento_final_m . '|digits:3',
            ]);
        }

        $request['autopista_id'] = $autopista->id;
        /* Crea tramo en el origen de datos. */
        Tramo::crearTramo($request->all());

        flash('EL tramo se registro correctamente.')->important();
        return redirect()->route('tramos.index', [$autopista]);
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

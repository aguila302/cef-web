<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\FactorElemento;
use App\valorPonderado;
use Illuminate\Http\Request;

class ResumenCalificacionController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Autopista $autopista) {
		$calificaciones = $autopista->secciones()->get();

		$valores = $calificaciones->each(function ($item) {

			return $item->cadenamiento_inicial_km . ' - ' . $item->cadenamiento_inicial_m . ' + ' . $item->cadenamiento_final_km . '-' . $item->cadenamiento_final_m;
		});

		$valorPonderado = valorPonderado::get();
		$factor = FactorElemento::get();

		return view('resumen.index', [
			'calificaciones' => $valores,
			'valorPonderado' => $valorPonderado,
			'factores' => $factor,
			'autopista' => $autopista,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}

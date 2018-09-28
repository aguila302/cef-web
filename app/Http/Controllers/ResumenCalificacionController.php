<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Cuerpo;
use App\Reporte\Factor;
use App\Reporte\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumenCalificacionController extends Controller {
	/**
	 * Visualizar el reporte de calificaciones de una autopista.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Autopista $autopista) {

		$secciones = Seccion::where('autopista_id', '=', $autopista->id)->orderBy('seccion', 'ASC')->get();

		$factores = Factor::groupBy('id')->get();

		return view('resumen.index', [
			'secciones' => $secciones,
			'factores' => $factores,
			'autopista' => $autopista,
		]);
	}

	/**
	 * Muestra una vista para consultar el reporte de calificaciones por seccion.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function resumenPorTramo(Autopista $autopista) {
		$secciones = DB::table('secciones')
			->join('reporte_secciones', 'secciones.id', '=', 'reporte_secciones.seccion_id')
			->get();
		$cuerpos = Cuerpo::get();

		return view('resumen.por-seccion', [
			'autopista' => $autopista,
			'secciones' => $secciones,
			'cuerpos' => $cuerpos,
			'row' => false,
		]);
	}

	/**
	 * Visualizar el reporte de calificaciones por sección de una autopista.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function consultar(Request $request, Autopista $autopista) {
		$secciones = DB::table('secciones')
			->join('reporte_secciones', 'secciones.id', '=', 'reporte_secciones.seccion_id')
			->get();
		$cuerpos = Cuerpo::get();
		$calificaciones = DB::table('calificaciones')
			->join('secciones', 'calificaciones.seccion_id', '=', 'secciones.id')
			->where('calificaciones.autopista_id', '=', $autopista->id)
			->where('secciones.cadenamiento_final_km', '<=', $request->seccion)
			->where('calificaciones.cuerpo_id', '=', $request->cuerpo)
			->select('calificaciones.seccion_id', DB::raw('cadenamiento_inicial_km || " - " || cadenamiento_inicial_km || " + " || cadenamiento_final_km || " - " || cadenamiento_final_km AS seccion, cadenamiento_final_km || cadenamiento_final_m - cadenamiento_inicial_km || cadenamiento_inicial_m as longitud'), DB::raw('350 as inicio'), DB::raw('450 as fin'))
			->groupBy('seccion')
			->get();

		$valoresCalificaciones = DB::table('calificaciones')
			->join('elementos', 'calificaciones.elemento_id', '=', 'elementos.id')
			->where('calificaciones.seccion_id', '=', 1)
			->select('calificaciones.elemento_id', 'elementos.descripcion', 'elementos.factor_elemento', DB::raw('sum(calificacion) as calificacion_total'), DB::raw('CASE WHEN calificaciones.elemento_id == 1 THEN 170.625 WHEN calificaciones.elemento_id == 2 THEN 22.75 WHEN calificaciones.elemento_id == 3 THEN 34.125 WHEN calificaciones.elemento_id == 4 THEN 61.25 WHEN calificaciones.elemento_id == 5 THEN 61.25 END AS inicio '))
			->groupBy('calificaciones.elemento_id')
			->get();

		return view('resumen.por-seccion', [
			'autopista' => $autopista,
			'calificaciones' => $calificaciones,
			'secciones' => $secciones,
			'cuerpos' => $cuerpos,
			'valoresCalificaciones' => $valoresCalificaciones,
		]);
	}
}

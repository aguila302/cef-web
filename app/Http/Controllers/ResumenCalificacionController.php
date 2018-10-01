<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Calificacion;
use App\Cuerpo;
use App\Reporte\Factor;
use App\Reporte\Seccion;
use Illuminate\Http\Request;

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

	public function resumenPorTramo(Request $request, Autopista $autopista) {

		$secciones = \App\Seccion::where('autopista_id', '=', $autopista->id)->get();
		$cuerpos = Cuerpo::get();

		$calificaciones = \App\Seccion::with(['calificaciones' => function ($q) use ($request) {
			$q->groupBy('elemento_id');
		}])->popular($request->seccion, $autopista->id)->get();

		// $r = $calificaciones->each(function ($item, $key) {
		// 	return $item['pon'] = $item->calificaciones->sum('calificacion');
		// });

		// dd($r);
		return view('resumen.por-seccion', [
			'autopista' => $autopista,
			'secciones' => $secciones,
			'cuerpos' => $cuerpos,
			'calificaciones' => $calificaciones,
		]);
	}

	/**
	 * Visualizar el reporte de calificaciones por sección de una autopista.
	 *
	 * @return \Illuminate\Http\Response
	 */
	// public function consultar(Request $request, Autopista $autopista) {
	// 	$calificaciones = \App\Seccion::popular()->get();
	// 	// return $calificaciones;
	// 	return redirect()->route('resumen-por-tramo', [$autopista]);
	// }
}

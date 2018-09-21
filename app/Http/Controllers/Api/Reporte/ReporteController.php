<?php

namespace App\Http\Controllers\Api\Reporte;

use App\Http\Controllers\Controller;
use App\Reporte\Concepto;
use App\Reporte\Factor;
use App\Reporte\Seccion;
use Illuminate\Http\Request;

class ReporteController extends Controller {

	/**
	 * Rwgistrar secciones para el reporte
	 */
	public function secciones(Request $request) {
		/* Validar información  */
		$request->validate([
			'autopista_id' => 'required',
			'seccion_id' => 'required',
			'seccion' => 'required',
		]);

		$seccion = new Seccion;

		$seccion->autopista_id = $request->autopista_id;
		$seccion->seccion_id = $request->seccion_id;
		$seccion->seccion = $request->seccion;

		$seccion->save();

		return response()
			->json([
				'id' => $seccion->id,
				'created_at' => $seccion->created_at->toDateTimeString(),
			], 201);
	}

	/**
	 * Rwgistrar conceptos para el reporte
	 */
	public function conceptos(Request $request) {
		/* Validar información  */
		$request->validate([
			'reporte_secciones_id' => 'required',
			'concepto_general' => 'required',
			'valor_ponderado' => 'required',
		]);

		$concepto = new Concepto;

		$concepto->reporte_secciones_id = $request->reporte_secciones_id;
		$concepto->concepto_general = $request->concepto_general;
		$concepto->valor_ponderado = $request->valor_ponderado;

		$concepto->save();

		return response()
			->json([
				'id' => $concepto->id,
				'created_at' => $concepto->created_at->toDateTimeString(),
			], 201);
	}

	public function factores(Request $request) {
		/* Validar información  */
		$request->validate([
			'reporte_conceptos_id' => 'required',
			'elemento_id' => 'required',
			'elemento' => 'required',
			'factor_elemento' => 'required',
		]);

		$factor = new Factor;

		$factor->reporte_conceptos_id = $request->reporte_conceptos_id;
		$factor->elemento_id = $request->elemento_id;
		$factor->elemento = $request->elemento;
		$factor->factor_elemento = $request->factor_elemento;

		$factor->save();

		return response()
			->json([
				'id' => $factor->id,
				'created_at' => $factor->created_at->toDateTimeString(),
			], 201);
	}
}

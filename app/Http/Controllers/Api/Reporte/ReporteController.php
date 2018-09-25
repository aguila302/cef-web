<?php

namespace App\Http\Controllers\Api\Reporte;

use App\Http\Controllers\Api\ApiController;
use App\Reporte\Concepto;
use App\Reporte\Factor;
use App\Reporte\Seccion;
use Illuminate\Http\Request;

class ReporteController extends ApiController {

	/**
	 * Rwgistrar secciones para el reporte
	 */
	public function secciones(Request $request) {
		/* Validar información  */
		$request->validate([
			'autopista_id' => 'required',
			'seccion_id' => 'required',
			'seccion' => 'required',
			'uuid' => 'required',
			'calificacion_tramo' => 'required',
		]);

		/**
		 * Verifica que una seccion solo se pueda sincronizar una sola vez, si la seccion
		 * ya se encuentra sincronizado responde con un mensaje de error.
		 */
		if (Seccion::where('uuid', $request->uuid)->exists()) {
			return $this->errorValidation('La sección ya se encuentra sincronizado', 'seccoin-sincronizado', '');
		}

		$seccion = new Seccion;

		$seccion->autopista_id = $request->autopista_id;
		$seccion->seccion_id = $request->seccion_id;
		$seccion->seccion = $request->seccion;
		$seccion->uuid = $request->uuid;
		$seccion->calificacion_tramo = $request->calificacion_tramo;
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
			'concepto_id' => 'required',
			'concepto_general' => 'required',
			'valor_ponderado' => 'required',
			'calificacion_general' => 'required',
		]);

		$concepto = new Concepto;

		$concepto->reporte_secciones_id = $request->reporte_secciones_id;
		$concepto->concepto_id = $request->concepto_id;
		$concepto->concepto_general = $request->concepto_general;
		$concepto->valor_ponderado = $request->valor_ponderado;
		$concepto->calificacion_general = $request->calificacion_general;

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
			'valor_particular' => 'required',
			'calificacion_particular' => 'required',
		]);

		$factor = new Factor;

		$factor->reporte_conceptos_id = $request->reporte_conceptos_id;
		$factor->elemento_id = $request->elemento_id;
		$factor->elemento = $request->elemento;
		$factor->factor_elemento = $request->factor_elemento;
		$factor->valor_particular = $request->valor_particular;
		$factor->calificacion_particular = $request->calificacion_particular;

		$factor->save();

		return response()
			->json([
				'id' => $factor->id,
				'created_at' => $factor->created_at->toDateTimeString(),
			], 201);
	}
}

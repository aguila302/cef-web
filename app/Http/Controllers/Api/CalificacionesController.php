<?php

namespace App\Http\Controllers\Api;

use App\Calificacion;
use Illuminate\Http\Request;

class CalificacionesController extends ApiController {
	/**
	 * Registrar una calificación en el origen de datos.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		/* Validamos la información. */
		$request->validate([
			'autopista_id' => 'exists:autopistas,id|required',
			'cuerpo_id' => 'exists:cuerpos,id|required',
			'seccion_id' => 'exists:secciones,id|required',
			'elemento_id' => 'exists:elementos,id|required',
			'defecto_id' => 'exists:defectos,id|required',
			'intensidad_id' => 'exists:intensidades,id|required',
			'calificacion' => 'numeric|required',
			'uuid' => 'required',
		]);

		/**
		 * Verifica que una seccion solo se pueda sincronizar una sola vez, si la seccion
		 * ya se encuentra sincronizado responde con un mensaje de error.
		 */
		if (Calificacion::where('uuid', $request->uuid)->exists()) {
			return $this->errorValidation('La calificación ya se encuentra sincronizado', 'calificación-sincronizado', '');
		}

		/* Registra el levantamiento en el origen de datos. */
		$calificacion = Calificacion::crearCalificacion($request->all());

		return response()
			->json([
				'id' => $calificacion->id,
				'created_at' => $calificacion->created_at->toDateTimeString(),
			], 201);
	}
}

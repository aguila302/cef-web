<?php

namespace App\Reporte;

use App\Reporte\Factor;
use App\Reporte\Seccion;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model {
	protected $table = 'reporte_conceptos';

	/**
	 * Factores que pertenecen a este concepto.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function factores() {
		return $this->hasMany(Factor::class, 'reporte_conceptos_id');
	}

	/**
	 * Concepto que petenecen a este factor elemento.
	 */
	public function seccion() {
		return $this->belongsTo(Seccion::class, 'reporte_secciones_id');
	}

	public function obtenerFactores($conceptoId) {
		return Factor::where('reporte_conceptos_id', '=', $conceptoId)->get();
	}
}

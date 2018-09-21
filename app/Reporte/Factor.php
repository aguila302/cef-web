<?php

namespace App\Reporte;

use App\Reporte\Concepto;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model {
	protected $table = 'reporte_factores';

	/**
	 * Concepto que petenecen a este factor elemento.
	 */
	public function concepto() {
		return $this->belongsTo(Concepto::class, 'reporte_conceptos_id');
	}
}

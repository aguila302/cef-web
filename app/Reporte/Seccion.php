<?php

namespace App\Reporte;

use App\Reporte\Concepto;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model {
	protected $table = 'reporte_secciones';

	/**
	 * Conceptos que pertenecen a esta sección.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function conceptos() {
		return $this->hasMany(Concepto::class, 'reporte_secciones_id');
	}
}

<?php

namespace App;

use App\Elemento;
use Illuminate\Database\Eloquent\Model;

class FactorElemento extends Model {
	protected $table = 'factores_elementos';

	/**
	 * Elemento que petenecen a este factor elemento.
	 */
	public function elemento() {
		return $this->belongsTo(Elemento::class);
	}
}

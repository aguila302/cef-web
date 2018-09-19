<?php

namespace App;

use App\ElementoGeneral;
use Illuminate\Database\Eloquent\Model;

class ValorPonderado extends Model {
	protected $table = 'valores_ponderados';

	/**
	 * Elementos que pertenecen a este valor ponderado.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function elementos() {
		return $this->hasMany(Elemento::class);
	}

	/**
	 * Elemento general que petenecen a este valor ponderado.
	 */
	public function elementoGeneral() {
		return $this->belongsTo(elementoGeneral::class, 'elemento_general_camino_id');
	}
}

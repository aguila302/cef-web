<?php

namespace App;

use App\Calificacion;
use App\Tramo;
use Illuminate\Database\Eloquent\Model;

class Autopista extends Model {
	/**
	 * Atributos que son asignados masivamente.
	 *
	 * @var array
	 */
	protected $fillable = [
		'descripcion', 'cadenamiento_inicial_km', 'cadenamiento_inicial_m', 'cadenamiento_final_km', 'cadenamiento_final_m',
	];

	/**
	 * Tramos que pertenecen a esta autopista.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tramos() {
		return $this->hasMany(Tramo::class);
	}

	/**
	 * Crea una nueva autopista en el origen de datos.
	 *
	 * @param array $data
	 *
	 */
	public static function crearAutopista($data) {
		$autopista = new static($data);
		$autopista->save();
	}

	/**
	 * Calificaciones que pertenecen a esta autopista.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function calificaciones() {
		return $this->hasMany(Calificacion::class);
	}
}

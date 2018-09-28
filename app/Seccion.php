<?php

namespace App;

use App\Tramo;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model {
	protected $table = 'secciones';

	/**
	 * Atributos que son asignados masivamente.
	 *
	 * @var array
	 */
	protected $fillable = [
		'cadenamiento_inicial_km', 'cadenamiento_inicial_m', 'cadenamiento_final_km', 'cadenamiento_final_m', 'autopista_id', 'tramo_id',
	];

	/**
	 * Crea una seccion para un tramo en el origen de datos.
	 *
	 * @param array $data.
	 *
	 */
	public static function crearSeccion($data) {
		$seccion = new static($data);
		$seccion->save();

	}

	/**
	 * Tramo que petenecen a esta seccion.
	 */
	public function tramo() {
		return $this->belongsTo(Tramo::class);
	}

	/**
	 * Autopista que petenecen a esta seccion.
	 */
	public function autopista() {
		return $this->belongsTo(Autopista::class);
	}

	/**
	 * Calificaciones que pertenecen a esta sección.
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function calificaciones() {
		return $this->hasMany(Calificacion::class);
	}

	public function scopePopular($query, $seccion, $autopista) {
		if ($seccion && $autopista) {
			return $query
				->join('calificaciones', 'secciones.id', '=', 'calificaciones.seccion_id')
				->join('elementos', 'calificaciones.elemento_id', '=', 'elementos.id')
				->where('calificaciones.autopista_id', '=', $autopista)
				->where('calificaciones.seccion_id', '=', $seccion)
				->groupBy('calificaciones.seccion_id');
		}
	}
}

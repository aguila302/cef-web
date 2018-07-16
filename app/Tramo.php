<?php

namespace App;

use App\Autopista;
use App\Seccion;
use App\Tramo;
use Illuminate\Database\Eloquent\Model;

class Tramo extends Model
{
    /**
     * Atributos que son asignados masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'cadenamiento_inicial_km', 'cadenamiento_inicial_m', 'cadenamiento_final_km', 'cadenamiento_final_m', 'autopista_id',
    ];

    /**
     * Crea un tramo en el origen de datos.
     *
     * @param array $data.
     *
     * @return Tramo $tramo
     */
    public static function crearTramo($data)
    {
        $tramo = new static($data);
        $tramo->save();

    }

    /**
     * Secciones que pertenecen a este tramos.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function secciones()
    {
        return $this->hasMany(Seccion::class);
    }

    /**
     * Autopista que petenecen a este tramo.
     */
    // public function autopista()
    // {
    //     return $this->belongsTo(Autopista::class);
    // }
}

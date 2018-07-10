<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autopista extends Model
{
    /**
     * Atributos que son asignados masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion', 'cadenamiento_inicial_km', 'cadenamiento_inicial_m', 'cadenamiento_final_km', 'cadenamiento_final_m',
    ];

    /**
     * Crea una nueva autopista en el origen de datos.
     *
     * @param array $data
     *
     */
    public static function crearAutopista($data)
    {
        $autopista = new static($data);
        $autopista->save();
    }
}

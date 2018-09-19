<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';

    protected $fillable = ['autopista_id', 'cuerpo_id', 'seccion_id', 'elemento_id', 'defecto_id', 'intensidad_id', 'calificacion'];
    /**
     * Registra calificacion en el origen de datos.
     *
     * @param array $data
     *
     */
    public static function crearCalificacion($data)
    {
        $calificacion = new static($data);
        $calificacion->save();
        return $calificacion;
    }
}

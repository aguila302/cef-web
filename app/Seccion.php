<?php

namespace App;

use App\Tramo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
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
    public static function crearSeccion($data)
    {
        $seccion = new static($data);
        $seccion->save();

    }

    /**
     * Tramo que petenecen a esta seccion.
     */
    public function tramo()
    {
        return $this->belongsTo(Tramo::class);
    }

    /**
     * Autopista que petenecen a esta seccion.
     */
    public function autopista()
    {
        return $this->belongsTo(Autopista::class);
    }

    /**
     * Calificaciones que pertenecen a esta sección.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function scopeBuscarSeccion(Builder $builder, $seccion, $cuerpo, $autopista)
    {
        if ($seccion && $cuerpo) {
            $builder
                ->join('calificaciones', 'calificaciones.seccion_id', '=', 'secciones.id')
                ->Where('calificaciones.seccion_id', '=', $seccion)
                ->where('calificaciones.autopista_id', '=', $autopista)
                ->where('calificaciones.cuerpo_id', '=', $cuerpo)
                ->select('secciones.id', 'secciones.cadenamiento_inicial_km', 'secciones.cadenamiento_inicial_m', 'secciones.cadenamiento_final_km', 'secciones.cadenamiento_final_m', '350 as inicio', '450 as fin')
                ->groupBy('secciones.id');

        } else {
            $builder
                ->join('calificaciones', 'calificaciones.seccion_id', '=', 'secciones.id')
                ->where('calificaciones.autopista_id', '=', $autopista)
                ->select('secciones.id', 'secciones.cadenamiento_inicial_km', 'secciones.cadenamiento_inicial_m', 'secciones.cadenamiento_final_km', 'secciones.cadenamiento_final_m', '350 as inicio', '450 as fin')
                ->groupBy('secciones.id');
        }
    }
}

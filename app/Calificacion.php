<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Calificacion extends Model
{
    protected $table = 'calificaciones';

    protected $fillable = ['autopista_id', 'cuerpo_id', 'seccion_id', 'elemento_id', 'defecto_id', 'intensidad_id', 'calificacion', 'uuid'];
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

    /**
     * Sección que petenecen a esta calificación.
     */
    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }

    /**
     * Elemento que petenecen a esta calificación.
     */
    public function elemento()
    {
        return $this->belongsTo(Elemento::class);
    }

    public function scopeCalificaciones($query, $seccionId, $elementoId)
    {
        $query->where('elemento_id', '=', $elementoId)
            ->where('seccion_id', '=', $seccionId)
            ->orderBy('defecto_id', 'ASC');
    }

    public function scopeBuscarSeccion(Builder $builder, $seccion, $cuerpo, $autopista)
    {
        if (!empty($seccion) && !empty($cuerpo)) {
            $builder
                ->join('secciones', 'secciones.id', '=', 'calificaciones.seccion_id')
                ->whereIn('calificaciones.seccion_id', '=', [$seccion])
                ->where('calificaciones.autopista_id', '=', $autopista)
                ->where('calificaciones.cuerpo_id', '=', $cuerpo)
                ->select('secciones.id', 'secciones.cadenamiento_inicial_km', 'secciones.cadenamiento_inicial_m', 'secciones.cadenamiento_final_km', 'secciones.cadenamiento_final_m', '350 as inicio', '450 as fin')
                ->groupBy('calificaciones.seccion_id');
        }
    }

    public function scopeCalificacion($query, $seccion, $cuerpoId)
    {
        if ($seccion && $cuerpoId) {
            $query
                ->join('elementos', 'calificaciones.elemento_id', '=', 'elementos.id')
                ->where('calificaciones.seccion_id', '=', $seccion)
                ->where('calificaciones.cuerpo_id', '=', $cuerpoId)
                ->select('elementos.id as id', 'elementos.descripcion as elemento', 'elementos.factor_elemento as factor_elemento', \DB::raw('sum(calificacion) as calificacion_total'), \DB::raw('(sum(calificacion) * factor_elemento) as calificacion_ponderada'))
                ->groupBy('calificaciones.elemento_id');

        } else {
            $query
                ->join('elementos', 'calificaciones.elemento_id', '=', 'elementos.id')
                ->where('calificaciones.seccion_id', '=', $seccion)
                ->select('elementos.id as id', 'elementos.descripcion as elemento', 'elementos.factor_elemento as factor_elemento', \DB::raw('sum(calificacion) as calificacion_total'), \DB::raw('(sum(calificacion) * factor_elemento) as calificacion_ponderada'))
                ->groupBy('calificaciones.elemento_id');
        }
    }

    public function obtenerEstadoFisicoInicial($elementoId)
    {
        $estadoFisico                      = '';
        $elementoId == (1) ? $estadoFisico = 170.625 : '';
        $elementoId == (2) ? $estadoFisico = 22.75 : '';
        $elementoId == (3) ? $estadoFisico = 34.125 : '';
        $elementoId == (4) ? $estadoFisico = 61.25 : '';
        $elementoId == (5) ? $estadoFisico = 61.25 : '';

        return $estadoFisico;
    }

    public function obtenerEstadoFisicoFinal($elementoId)
    {
        $estadoFisico                      = '';
        $elementoId == (1) ? $estadoFisico = 219.375 : '';
        $elementoId == (2) ? $estadoFisico = 29.25 : '';
        $elementoId == (3) ? $estadoFisico = 43.875 : '';
        $elementoId == (4) ? $estadoFisico = 78.75 : '';
        $elementoId == (5) ? $estadoFisico = 78.75 : '';

        return $estadoFisico;
    }

    public function scopePromedioPonderado($query, $seccion, $cuerpo, $autopista)
    {
        if ($seccion && $cuerpo) {
            $query->join('secciones', 'calificaciones.seccion_id', '=', 'secciones.id')
                ->join('elementos', 'calificaciones.elemento_id', '=', 'elementos.id')
                ->where('calificaciones.autopista_id', '=', $autopista)
                ->whereIn('calificaciones.seccion_id', $seccion)
                ->where('calificaciones.cuerpo_id', '=', $cuerpo)
                ->select('elementos.descripcion', \DB::raw('sum(calificacion) * elementos.factor_elemento as calificacion'))
                ->groupBy('calificaciones.elemento_id');
        } else {
            $query->join('secciones', 'calificaciones.seccion_id', '=', 'secciones.id')
                ->join('elementos', 'calificaciones.elemento_id', '=', 'elementos.id')
                ->where('calificaciones.autopista_id', '=', $autopista)
                ->select('elementos.descripcion', \DB::raw('sum(calificacion) * elementos.factor_elemento as calificacion'))
                ->groupBy('calificaciones.elemento_id');
        }
    }
}

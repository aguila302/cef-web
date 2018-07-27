<?php

namespace App\Http\Controllers\Api;

use App\Autopista;
use App\Seccion;
use App\Tramo;
use App\Transformers\SeccionTransformer;

class SeccionesController extends ApiController
{
    /**
     * Responde a un listado de secciones por autopista y por tramos.
     *
     * @param Autopista $autopista
     * @param Tramo $tramo
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerSecciones(Autopista $autopista, Tramo $tramo)
    {

        $secciones = Seccion::with('tramo', 'autopista')
            ->join('tramos', 'secciones.tramo_id', '=', 'tramos.id')
            ->join('autopistas', 'secciones.autopista_id', '=', 'autopistas.id')
            ->where('secciones.tramo_id', $tramo->id)
            ->where('secciones.autopista_id', $autopista->id)
            ->get();

        return $this->respondWithCollection($secciones, new SeccionTransformer);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Defecto;
use App\Intensidad;
use App\Transformers\RangosTransformer;

class RangosController extends ApiController
{

    /**
     * Responde a un listado de rangos aisgnadas a una intensidad
     *
     * @param Defecto $defecto
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerRangos(Defecto $defecto)
    {
        $rangos = $defecto->rangos()->get();
        return $this->respondWithCollection($rangos, new RangosTransformer);
    }
}

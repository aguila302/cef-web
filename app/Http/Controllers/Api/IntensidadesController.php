<?php

namespace App\Http\Controllers\Api;

use App\Elemento;
use App\Transformers\IntensidadTransformer;

class IntensidadesController extends ApiController
{

    /**
     * Responde a un listado de intensidades por elemento.
     *
     * @param Elemento $elemento
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerIntensidades(Elemento $elemento)
    {
        $intensidad = $elemento->intensidades()->get();

        return $this->respondWithCollection($intensidad, new IntensidadTransformer);
    }
}

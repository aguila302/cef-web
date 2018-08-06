<?php

namespace App\Http\Controllers\Api;

use App\Elemento;
use App\Transformers\FactoresTransformer;

class FactorElementoController extends ApiController
{
    /**
     * Responde a un listado de factores de elementos por elemento.
     *
     * @param Elemento $elemento
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerfactores(Elemento $elemento)
    {
        $factores = $elemento->factores()->get();

        return $this->respondWithCollection($factores, new FactoresTransformer);
    }
}

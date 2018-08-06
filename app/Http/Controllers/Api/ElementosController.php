<?php

namespace App\Http\Controllers\Api;

use App\Transformers\ElementoTransformer;
use App\ValorPonderado;

class ElementosController extends ApiController
{
    /**
     * Responde a un listado de elementos por valor ponderado.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerElementos(ValorPonderado $valorPonderado)
    {
        $elementos = $valorPonderado->elementos()->get();

        return $this->respondWithCollection($elementos, new ElementoTransformer);
    }
}

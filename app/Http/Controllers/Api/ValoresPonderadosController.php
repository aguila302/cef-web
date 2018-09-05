<?php

namespace App\Http\Controllers\Api;

use App\ElementoGeneral;
use App\Transformers\ValorPonderadoTransformer;

class ValoresPonderadosController extends ApiController
{
    /**
     * Responde a un listado de valores ponderados.
     *
     * @param ElementoGeneral $elementoGeneral
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerValoresPonderados(ElementoGeneral $elementoGeneral)
    {
        $valores = $elementoGeneral->valoresPonderados()->orderBy('id', 'ASC')->get();
        return $this->respondWithCollection($valores, new ValorPonderadoTransformer);
    }
}

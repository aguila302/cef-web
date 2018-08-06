<?php

namespace App\Http\Controllers\Api;

use App\ElementoGeneral;
use App\Transformers\ElementoGeneralCaminoTransformer;

class ElementosGeneralesCaminoController extends ApiController
{

    /**
     * Responde a un listado de elementos generales de un camino.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */

    public function obtenerElementosGeneralesCamino()
    {
        $elementosGenerales = ElementoGeneral::get();

        return $this->respondWithCollection($elementosGenerales, new ElementoGeneralCaminoTransformer);
    }
}

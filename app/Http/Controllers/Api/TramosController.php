<?php

namespace App\Http\Controllers\Api;

use App\Autopista;
use App\Transformers\TramoTransformer;

class TramosController extends ApiController
{
    /**
     * Responde a un listado de tramos por autopista.
     *
     * @param Autopista $autopista
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerTramos(Autopista $autopista)
    {
        $tramos = $autopista->tramos()->get();

        return $this->respondWithCollection($tramos, new TramoTransformer);
    }
}

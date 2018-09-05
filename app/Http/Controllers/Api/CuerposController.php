<?php

namespace App\Http\Controllers\Api;

use App\Cuerpo;
use App\Transformers\CuerposTransformer;

class CuerposController extends ApiController
{
    /**
     * Responde a un listado de cuerpos.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerCuerpos()
    {
        $cuerpo = Cuerpo::orderBy('id', 'ASC')->get();
        return $this->respondWithCollection($cuerpo, new CuerposTransformer);
    }
}

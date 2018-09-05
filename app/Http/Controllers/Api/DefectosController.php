<?php

namespace App\Http\Controllers\Api;

use App\Elemento;
use App\Transformers\DefectosTransformer;

class DefectosController extends ApiController
{
    /**
     * Responde a un listado de defectos por elemento.
     *
     * @param Elemento $elemento
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerDefectos(Elemento $elemento)
    {
        $defectos = $elemento->defectos()->orderBy('id', 'ASC')->get();
        return $this->respondWithCollection($defectos, new DefectosTransformer);
    }
}

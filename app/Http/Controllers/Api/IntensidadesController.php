<?php

namespace App\Http\Controllers\Api;

use App\Defecto;
use App\Elemento;
use App\Transformers\IntensidadTransformer;

class IntensidadesController extends ApiController
{
    /**
     * Responde a un listado de intensidades por elemento.
     *
     * @param Elemento $elemento
     * @param Defecto $defecto
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerIntensidades(Elemento $elemento, Defecto $defecto)
    {
        $intensidades = $elemento->intensidades()
            ->where('defecto_id', '=', $defecto->id)
            ->orderBy('id', 'ASC')
        // ->orderBy('defecto_id', 'ASC')
        // ->orderBy('elemento_id', 'ASC')
            ->get();
        // $intensidades = $defecto->intensidades()
        //     ->where('elemento_id', '=', $elemento->id)
        //     ->orderBy('id', 'ASC')
        //     ->orderBy('elemento_id', 'ASC')
        //     ->orderBy('defecto_id', 'ASC')
        //     ->get();
        // return $intensidades;
        return $this->respondWithCollection($intensidades, new IntensidadTransformer);
    }
}

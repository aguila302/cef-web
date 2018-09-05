<?php

namespace App\Http\Controllers\Api;

use App\Transformers\AutopistaTransformer;
use Illuminate\Http\Request;

class AutopistasController extends ApiController
{

    /**
     * Responde a un listado de autopistas aisgnadas a un usuario
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerAutopistas(Request $request)
    {
        $user       = $request->user();
        $autopistas = $user->autopistas()->orderBy('id', 'ASC')->get();

        return $this->respondWithCollection($autopistas, new AutopistaTransformer);
    }
}

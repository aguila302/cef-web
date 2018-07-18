<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UsuarioTransformer;
use Illuminate\Http\Request;

class UsuarioController extends ApiController
{
    /**
     * Response a un listado de un usuario.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerUsuario(Request $request)
    {
        $user = $request->user();
        return $this->respondWithItem($user, new UsuarioTransformer);
    }
}

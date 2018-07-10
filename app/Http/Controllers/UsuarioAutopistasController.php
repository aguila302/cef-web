<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuarioAutopistasController extends Controller
{
    /**
     * Asigna autopista a un usuario.
     *
     * @param Request $request.
     * @param User    $usuario.
     *
     */
    public function guardar(Request $request, User $usuario)
    {
        /* Validar autopistas seleccionadas en el formulario. */
        $request->validate([
            'autopistas' => 'exists:autopistas,id',
        ], [
            'autopistas.exists' => 'La autopista no se encuentra en el catalogo.',
        ]);

        /* Asignar autopistas a un usuario. */
        $usuario->asignaAutopista($request->autopistas);
        flash('La autopista se asigno correctamente')->important();
        return redirect()->route('usuarios.actualizar', [$usuario]);
    }

    /**
     * Excluye una autopista a un usuario.
     *
     * @param User      $user
     * @param Autopista $autopista
     */
    public function quitar(User $usuario, Autopista $autopista)
    {
        /* Quita una autopista a un usuario. */
        $usuario->autopistas()->detach($autopista);
        flash('La autopista se quito correctamente')->important();
        return back();
    }
}

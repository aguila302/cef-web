<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioAutopistasController extends Controller
{
    /**
     * Asigna autopista a un usuario.
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
}

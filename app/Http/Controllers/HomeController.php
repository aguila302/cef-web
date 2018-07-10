<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Muestra un listado de autopistas asignados a un usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioLogueado = Auth::user();
        $autopistas      = $usuarioLogueado->autopistas()->paginate();
        return view('autopistas.index')->withAutopistas($autopistas);
    }
}

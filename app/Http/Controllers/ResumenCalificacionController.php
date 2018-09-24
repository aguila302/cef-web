<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Reporte\Factor;
use App\Reporte\Seccion;

class ResumenCalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Autopista $autopista)
    {

        $secciones = Seccion::where('autopista_id', '=', $autopista->id)->orderBy('seccion', 'ASC')->get();

        $factores = Factor::groupBy('id')->get();

        return view('resumen.index', [
            'secciones' => $secciones,
            'factores'  => $factores,
            'autopista' => $autopista,
        ]);
    }
}

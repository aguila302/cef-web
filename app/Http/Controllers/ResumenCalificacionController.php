<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Calificacion;
use App\Cuerpo;
use App\Elemento;
use App\ElementoGeneral;
use App\Reporte\Seccion;
use Illuminate\Http\Request;

class ResumenCalificacionController extends Controller
{
    /**
     * Visualizar el reporte de calificaciones de una autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Autopista $autopista)
    {

        $secciones = $autopista->secciones()->whereIn('id', [1])->get();
        $secciones->each(function ($seccion) {
            $seccion['conceptos'] = ElementoGeneral::get();

            $seccion->conceptos->each(function ($concepto) use ($seccion) {
                $concepto['elementos'] = Elemento::where('elemento_general_camino_id', '=', $concepto->id)->get();
                $concepto->elementos->each(function ($elemento) use ($seccion) {
                    $elemento['calificaciones']   = Calificacion::calificaciones($seccion->id, $elemento->id)->get();
                    $elemento['minuendo']         = $elemento->calificaciones[0]->calificacion;
                    $elemento['excluido']         = $elemento->calificaciones->slice(1);
                    $elemento['sustraendo']       = $elemento->excluido->sum('calificacion');
                    $elemento['valor_particular'] = $elemento->minuendo - $elemento->sustraendo;
                });
            });
        });

        return view('resumen.index', [
            'secciones' => $secciones,
            'autopista' => $autopista,
        ]);
    }

    /**
     * Muestra una vista para consultar el reporte de calificaciones por seccion.
     *
     * @return \Illuminate\Http\Response
     */

    public function resumenPorTramo(Request $request, Autopista $autopista)
    {
        $secciones = \App\Seccion::where('autopista_id', '=', $autopista->id)->get();
        $cuerpos   = Cuerpo::get();

        /* Obtener listado de las secciones calificadas. */
        $calificaciones = \App\Seccion::buscarSeccion($request->secciones, $request->cuerpo, $autopista->id)->get();

        /* Si no hay información mostramos un mensaje. */
        if ($calificaciones->count() === 0) {
            flash('No hay información que mostrar.')->important();
            return redirect()->back();
        }

        /* Obtener calificaciones de las secciones. */
        $calificaciones->each(function ($item) use ($request) {
            $item['calificaciones']         = Calificacion::calificacion($item->id, $request->cuerpo)->get();
            $item['calificacion_ponderada'] = $item->calificaciones->sum('calificacion_ponderada');

            $item->calificaciones->map(function ($elemento) use ($item) {
                $elemento['inicio'] = $elemento->obtenerEstadoFisicoInicial($elemento->id);
                $elemento['fin']    = $elemento->obtenerEstadoFisicoFinal($elemento->id);
            });
        });

        $promedioPonderadoPorElemento = Calificacion::PromedioPonderado($request->secciones, $request->cuerpo, $autopista->id)->get();

        $numeroSecciones = $promedioPonderadoPorElemento->count();

        $promedioPonderado = $calificaciones->sum('calificacion_ponderada') / $calificaciones->count();

        return view('resumen.por-seccion', [
            'autopista'                    => $autopista,
            'secciones'                    => $secciones,
            'cuerpos'                      => $cuerpos,
            'calificaciones'               => $calificaciones,
            'promedioPonderado'            => $promedioPonderado,
            'promedioPonderadoPorElemento' => $promedioPonderadoPorElemento,
            'numeroSecciones'              => $numeroSecciones,
        ]);
    }
}

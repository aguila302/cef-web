<?php

namespace App\Http\Controllers\Api;

use App\Calificacion;
use Illuminate\Http\Request;

class CalificacionesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Registrar una calificación en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validamos la información. */
        $request->validate([
            'autopista_id'  => 'exists:autopistas,id|required',
            'cuerpo_id'     => 'exists:cuerpos,id|required',
            'seccion_id'    => 'exists:secciones,id|required',
            'elemento_id'   => 'exists:elementos,id|required',
            'defecto_id'    => 'exists:defectos,id|required',
            'intensidad_id' => 'exists:intensidades,id|required',
            'calificacion'  => 'numeric|required',
        ]);

        /* Registra el levantamiento en el origen de datos. */
        $calificacion = Calificacion::crearCalificacion($request->all());

        return response()
            ->json([
                'id'         => $calificacion->id,
                'created_at' => $calificacion->created_at->toDateTimeString(),
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

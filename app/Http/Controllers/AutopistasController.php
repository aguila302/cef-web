<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Rules\NuevaAutopista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutopistasController extends Controller
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

    /**
     * Muestra un formulario para registrar una autopista.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('autopistas.crear');
    }

    /**
     * Crear una autopista en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $request->validate($this->rules($request));

        /* Registramos la autopista en el origen de datos. */
        $autopista       = Autopista::crearAutopista($request->all());
        $usuarioLogueado = Auth::user();

        /* Asignar autopista a un usuario. */
        $usuarioLogueado->asignaAutopista($autopista);
        flash('La autopista se registro exitosamente.')->important();
        return redirect('/autopistas');
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
     * Muestra un formulario para actualizar una autopista.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Autopista $autopista)
    {
        $tramos = $autopista->tramos()->exists();
        if ($tramos) {
            flash('No puedes actualizar los datos de la autopista ya que se encuentra con tramos asignados.')->important();
            return redirect()->back();
        }
        return view('autopistas.actualizar')->withAutopista($autopista);
    }

    /**
     * Actualiza una autopista en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, Autopista $autopista)
    {
        /* Validamos los datos del formulario. */
        $request->validate($this->rules($request));

        /* Actualizamos la autopista en el origen de datos. */
        $autopista->update($request->all());

        flash('La autopista se actualizo exitosamente.')->important();
        return redirect('/autopistas');
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

    /**
     * Valida los datos del formulario.
     *
     * @param Request $request
     *
     */
    public function rules($request)
    {
        $rules = [
            'descripcion'             => 'required',
            'cadenamiento_inicial_km' => 'required|numeric|min:0|between:000,999',
            'cadenamiento_inicial_m'  => 'required|numeric|min:0|digits:3',
            'cadenamiento_final_km'   => 'required|numeric|min:' . $request->cadenamiento_inicial_km . '|between:' . $request->cadenamiento_inicial_km . ',999',
            'cadenamiento_final_m'    => ['required', 'numeric', 'digits:3', new NuevaAutopista($request)],
        ];

        return $rules;
    }
}

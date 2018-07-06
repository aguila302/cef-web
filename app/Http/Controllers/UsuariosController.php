<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Muestra un listado de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('name', 'ASC')->paginate();
        return view('usuarios.index')->withUsuarios($usuarios);
    }

    /**
     * Muestra un formulario para registrar un usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('usuarios.crear');
    }

    /**
     * Registra un nuevo usuario en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $usuario = new User;

        $usuario->name     = $request->name;
        $usuario->email    = $request->email;
        $usuario->username = $request->username;
        $usuario->password = $request->password;

        $usuario->save();
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

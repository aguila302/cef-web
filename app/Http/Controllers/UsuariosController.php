<?php

namespace App\Http\Controllers;

use App\Autopista;
use App\Rules\Password;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    private $contraseñaDeUsuario = '';

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
        /* Validar datos del formulario. */
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:4|confirmed',
        ]);

        /* Crea usuario en el origen de datos. */
        $usuario = User::crearUsuario($request->all());

        flash("El usuario {$usuario->username} se ha creado correctamente con la contraseña");
        return redirect('/usuarios');
    }

    /**
     * Genera un numero de cuatro digitos.
     *
     * @return integer
     */
    public function numeroDeCuatroDigitos()
    {
        $this->contraseñaDeUsuario = rand(0000, 9999);
        return $this->contraseñaDeUsuario;
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
     * Muestra un formulario para modificar un usuario.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function actualizar(User $usuario)
    {
        /* Muestra el catalogo de autopistas. */
        $autopistas = Autopista::orderBy('descripcion', 'ASC')->get();

        /* Muestra el catalogo de autopistas asignadas a un usuario. */
        $autopistasAsignadas = $usuario->autopistas->sortBy('descripcion');

        /* Remover la autopista selecionada de la lista de autopistas general. */
        $autopistasOrdenados = $autopistas->reject(function ($autopista) use ($autopistasAsignadas) {
            return $autopistasAsignadas->contains($autopista);
        });

        return view('usuarios.actualizar', [
            'usuario'             => $usuario,
            'autopistas'          => $autopistasOrdenados,
            'autopistasAsignadas' => $autopistasAsignadas,
        ]);
    }

    /**
     * Actualiza un usuario en el origen de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modificar(Request $request, User $usuario)
    {
        /* Validar datos del formulario. */
        $request->validate([
            'username'        => [
                'required',
                Rule::unique('users')->ignore($usuario->id),
            ],
            'password_actual' => ['required', new Password($usuario),
            ],
            'password'        => 'required|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);

        /* Actualizamos al usuario en el origen de datos. */
        $usuario->update($request->all());

        flash('El usuario se actualizo exitosamente.')->important();
        return redirect('/usuarios');
    }

    /**
     * Elimina un usuario del origen de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('El usuario se elimino exitosamente.')->important();
        return back();
    }
}

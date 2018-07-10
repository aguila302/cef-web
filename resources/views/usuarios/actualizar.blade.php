@extends('layouts.app')
@section('content-header')
    <h1 class="page-header">
        <a href="{{ route('usuarios.index') }}">Usuarios</a>
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-10 col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Actualizar usuario</h3>
            </div>
            <div class="box-body">
                @include('messages.message')
                <form method="POST" action="{{ route('usuarios.modificar', $usuario) }}" role="form">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre del usuario" value="{{ $usuario->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Correo electronico" value="{{ $usuario->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" value="{{ $usuario->username }}">
                        </div>

                        <div class="form-group">
                            <label>Contraseña actual:</label>
                            <input type="password" name="password_actual" class="form-control" placeholder="Nombre de usuario">
                        </div>

                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="text" name="password" class="form-control" placeholder="Nombre de usuario" value="">
                        </div>
                         <div class="form-group">
                            <label>Confirmar contraseña:</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Asignar autopistas a este usuario</h3>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ route('usuario.autopistas.guardar', $usuario) }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <select name="autopistas" class="form-control selectpicker">
                                @foreach($autopistas as $autopista)
                                    <option value="{{ $autopista->id }}">{{ $autopista->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Asignar autopistas</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Autopistas asignadas a este usuario</h3>
                <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autopistasAsignadas as $autopistaAsignada)
                            <tr>
                                <td>{{ $autopistaAsignada->descripcion }}</td>
                                <td>
                                    <form method="POST" action="{{ route('usuario.autopistas.quitar', [$usuario, $autopistaAsignada]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-default">Quitar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

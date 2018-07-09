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
                <h3 class="box-title">Nuevo usuario</h3>
            </div>
            <div class="box-body">
                @include('messages.message')
                <form method="POST" action="{{ route('usuarios.guardar') }}" role="form">
                    @csrf
                    <div class="box-body">
                         <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre del usuario" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Correo electronico" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" value="{{ old('username') }}">
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
    </div>
</div>
@endsection

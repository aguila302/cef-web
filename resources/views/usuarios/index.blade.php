@extends('layouts.app')
@section('content-header')
    <h1>
        Usuarios
            <a href="{{ route('usuarios.crear') }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nuevo usuario</a>
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-striped">
                    <thead class="p-3 mb-2 bg-light text-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo electronico</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->username }}</td>
                            <td>{{ $usuario->email }}</td>
                             <td>
                                <a href="{{ route('usuarios.actualizar', $usuario) }}" class="btn btn-link">Editar</a>
                            </td>
                            <td>
                                 <form action="{{ route('usuarios.delete', $usuario) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

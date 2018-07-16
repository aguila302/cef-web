@extends('layouts.app')
@section('content-header')
    <h1>
        Autopistas
        <a href="{{ route('autopistas.crear') }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nueva autopista</a>
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cadenamiento inicial</th>
                            <th>Cadenamiento final</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($autopistas as $autopista)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                               <a href="{{ route('tramos.index', $autopista) }}">
                                    <strong>{{ $autopista->descripcion }}</strong>
                                </a>
                            </td>
                            <td>{{ $autopista->cadenamiento_inicial_km }} + {{ $autopista->cadenamiento_inicial_m }}</td>
                            <td>{{ $autopista->cadenamiento_final_km }} + {{ $autopista->cadenamiento_final_m }}</td>
                            <td>
                                <a class="btn btn-link" href="{{ route('autopistas.actualizar', $autopista) }}">Editar</a>
                            </td>
                            {{--
                            <td>
                                 <form action="{{ route('autopistas.delete', $autopista) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Eliminar</button>
                                </form>
                            </td>
                            --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $autopistas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

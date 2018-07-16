@extends('layouts.autopista')

@section('content-header')
    <h1>
        Tramos de la autopista {{ $autopista->descripcion }} {{ $autopista->cadenamiento_inicial_km.' + '.$autopista->cadenamiento_inicial_m }} - {{ $autopista->cadenamiento_final_km.' + '.$autopista->cadenamiento_final_m }}
        <a href="{{ route('tramos.registrar', $autopista) }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nuevo tramo</a>
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
                            <th>Cadenamiento inicial</th>
                            <th>Cadenamiento final</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tramos as $tramo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tramo->cadenamiento_inicial_km }} + {{ $tramo->cadenamiento_inicial_m }}</td>
                                <td>{{ $tramo->cadenamiento_final_km }} + {{ $tramo->cadenamiento_final_m }}</td>
                                <td>
                                    <a class="btn btn-link" href="{{ route('secciones.index', [$autopista, $tramo]) }}">Ver secciones</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $levantamientos->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

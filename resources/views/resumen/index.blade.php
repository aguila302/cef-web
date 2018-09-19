@extends('layouts.autopista')

@section('content-header')
    <h1>
        Calificaciones de la autopista {{ $autopista->descripcion }}
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
                            <th>Sección</th>
                            <th>Concepto general</th>
                            <th>Valor ponderado general</th>
                            <th>Concepto particular</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calificaciones as $calificacion)
                            <tr>
                                <td>
                                    {{ $calificacion->cadenamiento_inicial_km .' - '. $calificacion->cadenamiento_inicial_m .' + '. $calificacion->cadenamiento_final_km .'-'. $calificacion->cadenamiento_final_m }}
                                </td>
                                <td>
                                    {{ $calificacion->elemento->valorPonderado->elementoGeneral->descripcion }}
                                </td>
                                <td>
                                    {{ $calificacion->elemento->valorPonderado->valor_ponderado }}
                                </td>
                                <td>
                                    {{ $calificacion->elemento->descripcion }}
                                </td>
                                {{-- <td>{{ $tramo->cadenamiento_inicial_km }} + {{ $tramo->cadenamiento_inicial_m }}</td>
                                <td>{{ $tramo->cadenamiento_final_km }} + {{ $tramo->cadenamiento_final_m }}</td>
                                <td>
                                    <a class="btn btn-link" href="{{ route('secciones.index', [$autopista, $tramo]) }}">Ver secciones</a>
                                </td> --}}
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

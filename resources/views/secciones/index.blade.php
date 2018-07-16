@extends('layouts.secciones')

@section('content-header')
    <h1>
        Secciones del tramo {{ $tramo->cadenamiento_inicial_km .' + '. $tramo->cadenamiento_inicial_m }} - {{ $tramo->cadenamiento_final_km .' + '. $tramo->cadenamiento_final_m }} de la autopista {{ $autopista->descripcion }}
        <a href="{{ route('secciones.registrar', [$autopista, $tramo]) }}" class="btn btn-success pull-right"> <i class="fa fa-plus"></i> Nueva sección</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($secciones as $seccion)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $seccion->cadenamiento_inicial_km }} + {{ $seccion->cadenamiento_inicial_m }}</td>
                                <td>{{ $seccion->cadenamiento_final_km }} + {{ $seccion->cadenamiento_final_m }}</td>
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

@extends('layouts.autopista')

@section('content-header')
    <h1>
        Calificaciones por sección de la autopista {{ $autopista->descripcion }}
    </h1>
@endsection
@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">

                <form method="POST" action="{{ route('resumen-por-tramo', $autopista) }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <select name="seccion" class="form-control selectpicker">
                                @foreach($secciones as $seccion)
                                    <option value="{{ $seccion->id }}">{{ $seccion->cadenamiento_inicial_km .' - '. $seccion->cadenamiento_inicial_m .' + ' .$seccion->cadenamiento_final_km .' - '. $seccion->cadenamiento_final_m }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="cuerpo" class="form-control selectpicker">
                                @foreach($cuerpos as $cuerpo)
                                    <option value="{{ $cuerpo->id }}">{{ $cuerpo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Consultar</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                    </thead>
                    <tbody>
                        {{ $calificaciones }}
                        @foreach($calificaciones as $calificacion)
                            <tr>
                                <td>{{ $calificacion->cadenamiento_inicial_km . ' - ' . $calificacion->cadenamiento_inicial_m . ' + '. $calificacion->cadenamiento_final_km . ' - ' . $calificacion->cadenamiento_final_m }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Calificación ponderada
                                </td>
                            </tr>
                            <tr>
                                @foreach($calificacion->calificaciones as $calificacion)
                                <td>
                                    {{ $calificacion->elemento->descripcion }}
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

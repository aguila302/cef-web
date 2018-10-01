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
                        @foreach($calificaciones as $calificacion)
                            <tr class="active">
                                <td colspan="4" class="text-center">
                                    <strong>
                                        Sección: {{ $calificacion->cadenamiento_inicial_km . ' - ' . $calificacion->cadenamiento_inicial_m . ' + '. $calificacion->cadenamiento_final_km . ' - ' . $calificacion->cadenamiento_final_m }}
                                    </strong>
                                </td>
                            </tr>
                            <tr class="active">
                                <td colspan="4" class="text-center">
                                    Calificación ponderada
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">
                                    {{ $calificacion->calificacion_ponderada }}
                                </td>
                            </tr>
                            <tr class="active">
                                <td colspan="4" class="text-center">
                                    Estado físico
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center">
                                    @if ($calificacion->calificacion_ponderada < $calificacion->inicio)
                                        M
                                    @elseif ($calificacion->calificacion_ponderada >= $calificacion->inicio && $calificacion->calificacion_ponderada < $calificacion->fin)
                                        R
                                    @elseif ($calificacion->calificacion_ponderada >= $calificacion->fin)
                                        B
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr class="active">
                                <td colspan="4" class="text-center">
                                   Calificación por elemento
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   Elemento
                                </td>
                                <td>
                                   Calificación ponderada por elemento
                                </td>
                                <td>
                                   Estado físico
                                </td>
                            </tr>
                            @foreach($calificacion->calificaciones as $calificacionValor)
                                <tr>
                                    <td>
                                        {{ $calificacionValor->elemento }}
                                    </td>
                                    <td>
                                        {{ $calificacionValor->calificacion_ponderada }}
                                    </td>
                                    <td>
                                        @if ($calificacionValor->calificacion_total < $calificacionValor->inicio)
                                            <span class="label label-danger">M</span>
                                        @elseif ($calificacionValor->calificacion_total >= $calificacion->inicio && $calificacionValor->calificacion_total < $calificacionValor->fin)
                                            <span class="label label-warning">R</span>
                                        @elseif ($calificacionValor->calificacion_total >= $calificacionValor->fin)
                                            <span class="label label-success">B</span>
                                        @else
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                 <table class="table table-bordered">
                    <thead>
                        <tbody>
                            <tr class="active">
                                <td colspan="3" class="text-center">
                                    Promedios ponderados
                                </td>
                            </tr>
                             <tr>
                                <td colspan="3" class="text-center">
                                    {{ $promedioPonderado }}
                                </td>
                            </tr>
                            <tr class="active">
                                <td colspan="3" class="text-center">
                                    Promedios ponderados por elemento
                                </td>
                            </tr>
                            @foreach($promedioPonderadoPorElemento as $promedioValor)
                            <tr>
                                <td colspan="2">
                                    {{ $promedioValor->descripcion }}
                                </td>
                                <td>
                                    {{ $promedioValor->calificacion / $calificaciones->count() }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

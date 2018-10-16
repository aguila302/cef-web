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
                <table class="table table-bordered">
{{--                     <thead>
                        <tr>
                            <th colspan="4">Sección</th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        @foreach ($secciones as $seccion)
                            <tr>
                                <td class="info text-center" colspan="4">
                                    <p class="text-info">
                                        {{ $seccion->cadenamiento_inicial_km .' - '. $seccion->cadenamiento_inicial_m .' + ' .$seccion->cadenamiento_final_km .' - '. $seccion->cadenamiento_final_m }}
                                    </p>
                                </td>
                            </tr>
                            @foreach ($seccion->conceptos as $concepto)
                                <tr>
                                    <td class="active text-center" colspan="4">
                                        {{ $concepto->descripcion }}
                                        <br>
                                        {{ $concepto->valor_ponderado }}
                                    </td>
                                </tr>
                                @foreach ($concepto->elementos as $elemento)
                                    <tr>
                                        <td>
                                            {{ $elemento->descripcion }}
                                        </td>
                                        <td>
                                            {{ $elemento->factor_particular }}
                                        </td>
                                        <td>
                                            {{ $elemento->valor_particular }}
                                        </td>
                                        <td>
                                            {{ $elemento->calificacion_particular }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        Calificación general
                                    </td>
                                    <td class="text-right" colspan="3">
                                        {{ $concepto->calificacion_general }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    Calificación del tramo
                                </td>
                                <td class="text-right" colspan="3">
                                    {{ $seccion->calificacion_tramo }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

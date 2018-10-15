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
                    <thead>
                        <tr>
                            <th colspan="4">Sección</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ $secciones }} --}}
                        @foreach ($secciones as $seccion)
                            <tr>
                                <td colspan="4">
                                    {{ $seccion->cadenamiento_inicial_km .' - '. $seccion->cadenamiento_inicial_m .' + ' .$seccion->cadenamiento_final_km .' - '. $seccion->cadenamiento_final_m }}
                                </td>
                            </tr>
                            @foreach ($seccion->conceptos as $concepto)
                                <tr>
                                        <td colspan="4">
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
                                    <td colspan="3">
                                        {{ $concepto->calificacion_general }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    Calificación del tramo
                                </td>
                                <td colspan="3">
                                    {{ $seccion->calificacion_tramo }}
                                </td>
                            </tr>
                        @endforeach












                        {{-- @foreach ($secciones as $seccion)
                            <tr>
                                <td rowspan="8">
                                    {{ $seccion->seccion }}
                                </td>
                                <td rowspan="8">
                                    {{ $seccion->calificacion_tramo }}
                                </td>
                            </tr>
                            @foreach ($seccion->obtenerConceptos($seccion->seccion_id) as $concepto)
                                @if ($concepto->concepto_general === 'DE LA CORONA')
                                    @php $rowpan = 3 @endphp
                                @elseif ($concepto->concepto_general === 'DEL SEÑALAMIENTO')
                                    @php $rowpan = 2 @endphp
                                @endif
                                <tr>
                                    <td rowspan="{{ $rowpan + 1 }}">
                                        {{ $concepto->concepto_general }}
                                    </td>
                                    <td rowspan="{{ $rowpan + 1 }}">
                                       {{ $concepto->valor_ponderado }}
                                    </td>
                                    <td rowspan="{{ $rowpan + 1 }}">
                                         {{ $concepto->calificacion_general }}
                                    </td>
                                </tr>
                                @foreach ($concepto->obtenerFactores($concepto->concepto_id) as $factor)
                                    <tr>
                                        <td>
                                            {{ $factor->elemento }}
                                        </td>
                                        <td>
                                            {{ $factor->factor_elemento }}
                                        </td>
                                        <td>
                                            {{ number_format($factor->valor_particular) }}
                                        </td>
                                        <td>
                                            {{ $factor->calificacion_particular }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

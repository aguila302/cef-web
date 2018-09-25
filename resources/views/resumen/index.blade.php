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
                            <th>Sección</th>
                            <th>Calificación tramo</th>
                            <th>Concepto general</th>
                            <th>Valor ponderado general</th>
                            <th>Calificación general</th>
                            <th>Concepto particular</th>
                            <th>Factor particular</th>
                            <th>Valor particular</th>
                            <th>Calificación particular</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($secciones as $seccion)
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
                                            {{ $factor->valor_particular }}
                                        </td>
                                        <td>
                                            {{ $factor->calificacion_particular }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

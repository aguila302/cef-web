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
                    {{-- <thead>
                        <tr>
                            <th>#</th>
                            <th>Sección</th>
                            <th>Concepto general</th>
                            <th>Valor ponderado general</th>
                            <th>Concepto particular</th>

                        </tr>
                    </thead> --}}
                    <tbody>
                        {{ $val }}
                        @foreach ($calificaciones as $calificacion)

                            <tr>
                                <th>
                                    Sección: {{ $calificacion->cadenamiento_inicial_km .' - '. $calificacion->cadenamiento_inicial_m .' + '. $calificacion->cadenamiento_final_km .'-'. $calificacion->cadenamiento_final_m }}
                                </th>
                            </tr>
                            @foreach ($valorPonderado as $valor)
                                <tr>
                                    <th>
                                        CONCEPTO GENERAL {{ $valor->elementoGeneral->descripcion }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        VALOR PONDERADO GRAL {{ $valor->valor_ponderado }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>CONCEPTO PARTICULAR</th>
                                    <th>FACTORES PARTICULARES</th>
                                    @foreach ($valor->elementos as $valor1)
                                    @foreach ($valor1->factores as $v)
                                    <tr>
                                        <td>
                                            {{ $valor1->descripcion }}
                                        </td>
                                        <td>
                                            {{ $v->factor_elemento }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $levantamientos->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

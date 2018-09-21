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
                            {{-- <th>#</th> --}}
                            <th>Sección</th>
                            <th>Concepto general</th>
                            <th>Valor ponderado general</th>
                            <th>Concepto particular</th>

                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($factores as $factor)
                        <tr>
                            <td>
                                {{ $factor->concepto->seccion->seccion }}
                            </td>
                            <td>
                                {{ $factor->concepto->concepto_general }}
                            </td>
                            <td>
                                {{ $factor->elemento }}
                            </td>
                            <td>
                                {{ $factor->factor_elemento }}
                            </td>
                        </tr>
                        @endforeach --}}
                        @foreach ($secciones as $seccion)
                        @foreach ($seccion->conceptos as $concepto)
                        @foreach ($concepto->factores as $factor)
                         <tr>
                            <td>
                                {{ $seccion->seccion }}
                            </td>
                            <td>
                                {{ $concepto->concepto_general }} <br>
                            </td>
                            <td>
                                {{ $concepto->valor_ponderado }}
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

@extends('layouts.autopista')
@section('content-header')
    <h1 class="page-header">
        <a href="{{ route('tramos.index', $autopista) }}">Tramos</a>
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-10 col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Nuevo tramo para la autopista {{ $autopista->descripcion }} {{ $autopista->cadenamiento_inicial_km .' + '. $autopista->cadenamiento_inicial_m }} - {{ $autopista->cadenamiento_final_km .' + '. $autopista->cadenamiento_final_m }}</h3>
            </div>
            <div class="box-body">
{{--                 <div class="callout callout-warning">
                    <h4>Nota!</h4>
                    <p>Solo puedes registrar tramos entre los rangos {{ $autopista->cadenamiento_inicial_km }} + {{ $autopista->cadenamiento_inicial_m }} y {{ $autopista->cadenamiento_final_km }} + {{ $autopista->cadenamiento_final_m }}.</p>
                </div> --}}
                @include('messages.message')
                <form method="POST" action="{{ route('tramos.guardar', $autopista) }}" role="form">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Cadenamiento inicial:</label>
                            <div class="row">
                                <div class="col-xs-5">
                                    <input type="text" {{ isset($ultimoTramo->cadenamiento_final_km) ? 'readonly' : '' }} placeholder="Kilometros" class="form-control" name="cadenamiento_inicial_km" value="{{ isset($ultimoTramo->cadenamiento_final_km) ? $ultimoTramo->cadenamiento_final_km : old('cadenamiento_inicial_km') }}">
                                </div>
                                <div class="col-xs-2">
                                    <p class="text-center">+</p>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" {{ isset($ultimoTramo->cadenamiento_final_m) ? 'readonly' : '' }} placeholder="Metros" class="form-control" name="cadenamiento_inicial_m" value="{{ isset($ultimoTramo->cadenamiento_final_m) ? $ultimoTramo->cadenamiento_final_m : old('cadenamiento_inicial_m') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cadenamiento final:</label>
                            <div class="row">
                                <div class="col-xs-5">
                                    <input type="text" placeholder="Kilometros" class="form-control" name="cadenamiento_final_km" value="{{ old('cadenamiento_final_km') }}">
                                </div>
                                <div class="col-xs-2">
                                    <p class="text-center">+</p>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" placeholder="Metros" class="form-control" name="cadenamiento_final_m" value="{{ old('cadenamiento_final_m') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

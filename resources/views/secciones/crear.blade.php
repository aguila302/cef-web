@extends('layouts.secciones')
@section('content-header')
    <h1 class="page-header">
        <a href="{{ route('secciones.index', [$autopista, $tramo]) }}">Secciones</a>
    </h1>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-10 col-md-10 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Nueva sección para el tramos {{ $tramo->cadenamiento_inicial_km.' + '. $tramo->cadenamiento_inicial_m }} - {{ $tramo->cadenamiento_final_km.' + '. $tramo->cadenamiento_final_m }}</h3>
            </div>
            <div class="box-body">
                @include('messages.message')
                <form method="POST" action="{{ route('secciones.guardar', [$autopista, $tramo]) }}" role="form">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Cadenamiento inicial:</label>
                            <div class="row">
                                <div class="col-xs-5">
                                    <input type="text" {{ isset($ultimaSeccion->cadenamiento_final_km) ? 'readonly' : '' }} placeholder="Kilometros" class="form-control" name="cadenamiento_inicial_km" value="{{ isset($ultimaSeccion->cadenamiento_final_km) ? $ultimaSeccion->cadenamiento_final_km : old('cadenamiento_inicial_km') }}">
                                </div>
                                <div class="col-xs-2">
                                    <p class="text-center">+</p>
                                </div>
                                <div class="col-xs-5">
                                    <input type="text" {{ isset($ultimaSeccion->cadenamiento_final_km) ? 'readonly' : '' }} placeholder="Metros" class="form-control" name="cadenamiento_inicial_m" value="{{ isset($ultimaSeccion->cadenamiento_final_m) ? $ultimaSeccion->cadenamiento_final_m : old('cadenamiento_inicial_m') }}">
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

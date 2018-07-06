@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light mb-3">
                <div class="card-header">Autopistas</div>
                <div class="card-body">
                    {{-- @role('admin')
                        <a href="{{ route('autopistas.create') }}" class="btn btn-primary pull-right">Nueva autopista</a>
                    @endrole --}}
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead class="p-3 mb-2 bg-light text-dark">
                            <tr>
                                <th>#</th>
                                <th>Autopista</th>
                                <th>Cadenamiento inicial</th>
                                <th>Cadenamiento final</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

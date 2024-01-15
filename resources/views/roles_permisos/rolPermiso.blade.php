@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-bold" style="color: #3c8dbc;">Roles y Permisos</h1>
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">{{ $role->name }}</h3>
        </div>

        <div class="card-body">
            <div class="mb-4">
                <h5>Lista de Permisos</h5>

                {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                <div class="row">
                    @foreach ($permisos as $permiso)
                        <div class="col-md-3">
                            <div class="custom-control custom-checkbox">
                                {!! Form::checkbox('permisos[]', $permiso->id, in_array($permiso->name, $role->getPermissionNames()->toArray()), ['class' => 'custom-control-input', 'id' => 'permiso_' . $permiso->id]) !!}
                                <label class="custom-control-label" for="permiso_{{ $permiso->id }}">{{ $permiso->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                {!! Form::submit('Asignar Permisos', ['class' =>'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .custom-control-input:checked~.custom-control-label::before {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        .custom-control-input:checked~.custom-control-label::after {
            color: #fff !important;
        }

        .btn-primary {
            background-color: #3c8dbc;
            border-color: #3c8dbc;
        }

        .btn-primary:hover {
            background-color: #3071a9;
            border-color: #3071a9;
        }
    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script> console.log('Hi!'); </script>
@stop

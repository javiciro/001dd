@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-bold" style="color: #3c8dbc;">Detalles de Usuarios y Roles</h1>
@stop

@section('content')
    <div class="card card-primary card-outline">
        
        <div class="card-header bg-white">
            <h2 class="card-title">Detalles del Usuario: {{ $user->name }}</h2>
        </div>

        <div class="card-body">
            <h3 class="text-primary">Lista de Permisos</h3>

            {!! Form::model($user, ['route' => ['asignar.update', $user], 'method' => 'put']) !!}
            <div class="row">
                @foreach($roles as $role)
                    <div class="col-md-3">
                        <div class="custom-control custom-checkbox">
                            {!! Form::checkbox('roles[]', $role->id, $user->hasRole($role->name), ['class' => 'custom-control-input', 'id' => 'role_' . $role->id]) !!}
                            <label class="custom-control-label font-weight-bold text-primary" for="role_{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
          
            {!! Form::submit('Asignar Roles', ['class' =>'btn btn-primary mt-3']) !!}
        
            {!! Form::close() !!}
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
    <script> console.log('Hi!'); </script>
@stop

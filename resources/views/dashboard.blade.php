@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="text-center">
    <h1 style="color: #1285AD;">¡Bienvenido a Papelería Universal!</h1>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="lead text-center">Explora las funciones clave para el funcionamiento de la empresa:</p>

                    <div class="row mt-4">
                        @foreach(['Conductores', 'Recursos Humanos', 'Informes para Tesorería', 'Mercadeo'] as $feature)
                            <div class="col-md-6 mb-4">
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">{{ $feature }}</h5>
                                        <p class="card-text">
                                            @if($feature == 'Conductores')
                                                Gestiona la información y actividades de los repartidores.
                                            @elseif($feature == 'Recursos Humanos')
                                                Administra el personal, permisos y otros aspectos de recursos humanos.
                                            @elseif($feature == 'Informes para Tesorería')
                                                Accede a informes relacionados con las actividades de los repartidores.
                                            @elseif($feature == 'Mercadeo')
                                                Analiza estrategias de marketing y visualiza informes relacionados con el área de mercadeo.
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
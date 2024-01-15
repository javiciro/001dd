@extends('adminlte::page')

@section('content')
<style>
    /* Estilo para el título "Listado de clientes creados" */
    .card-header h3 {
        font-size: 24px;
        color: #3498db;
        text-transform: uppercase;
        margin-bottom: 10px; /* Add some space below the title */
    }

    /* Estilo para el botón "Crear Cliente" */
    .card-header a.btn-primary {
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        float: right;
        font-size: 18px;
    }

    /* Estilo para la tabla */
    .table {
        background-color: #ffffff;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1); /* Softer box shadow */
        border-radius: 8px; /* Slightly rounded corners */
    }

    /* Aumentar el tamaño de las letras en la tabla */
    .table th, .table td {
        font-size: 16px;
    }

    /* Estilo para la primera columna "Nombre del Cliente" */
    .font-size-large {
        font-size: 18px;
    }

    /* Estilo para la fila cuando no hay clientes */
    .empty-row {
        text-align: center;
        font-weight: bold;
        color: #777;
        padding: 20px; /* Add some padding for better visibility */
    }

    /* Style for alternating row colors */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    /* Style for hover effect on table rows */
    .table-hover tbody tr:hover {
        background-color: #e6f7ff; /* Light blue background on hover */
    }
</style>

<div class="container main-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de clientes creados</h3>
                    <!-- Formulario para crear un nuevo cliente -->
                    <a href="{{ route('conductores.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Crear Cliente
                    </a>
                </div>
               
                <div class="table-responsive">
                    @if($clientes->isEmpty())
                        <p class="empty-row">No hay clientes creados.</p>
                    @else
                        <table class="table table-bordered table-striped table-white table-hover">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Nombre del Cliente</th>
                                    <th>Numero Factura</th>
                                    <th>Observación</th>
                                    <th>Valor</th>
                                    <th>Número de Factura</th>
                                    <th>Correo del Cliente</th>
                                    <th>Dirección del Cliente</th>
                                    <th>Teléfono del Cliente</th>
                                    <th>Fecha de Creación</th>
                                    <th>Numero de Placa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->estado }}</td>
                                    <td class="font-size-large">{{ $cliente->cliente_nombre }}</td>
                                    <td>{{ $cliente->numero_factura }}</td>
                                    <td>{{ $cliente->observacion }}</td>
                                    <td>{{ number_format($cliente->valor, 2, '.', ',') }}</td>
                                    <td>{{ $cliente->num_factura }}</td>
                                    <td>{{ $cliente->correo_cliente }}</td>
                                    <td>{{ $cliente->direccion_cliente }}</td>
                                    <td>{{ $cliente->telefono_cliente }}</td>
                                    <td>{{ $cliente->updated_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $cliente->num_placa }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clientes->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

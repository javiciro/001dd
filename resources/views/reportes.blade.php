@extends('adminlte::page')

@section('content')
    <style>
        .custom-container {
            margin-top: 20px;
        }

        .custom-card {
            border: 1px solid #dfe4ea;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dfe4ea;
        }

        .custom-filter-form {
            margin-bottom: 20px;
        }

        .custom-table {
            color: #000000;
        }

        .custom-total-alert {
            background-color: #3498db;
            color: #ffffff;
            border: 1px solid #3498db;
        }

        .custom-total-alert h4 {
            margin-bottom: 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            background-color: #ffffff;
        }

        .table th,
        .table td {
            border: 1px solid #dfe4ea;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .font-size-large {
            font-size: 18px;
        }
    </style>

    <div class="container custom-container">
        <div class="card custom-card">
            <div class="card-header bg-white custom-card-header">
                <h2>Informes por Día</h2>
                <form method="GET" action="{{ route('reportes.index') }}" class="mb-4 custom-filter-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date_filter" class="form-label">Filtrar por Fecha:</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="date_filter" id="date_filter"
                                    value="{{ request('date_filter') }}">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="alert custom-total-alert" role="alert">
                    <h4>Total Valor hecho: ${{ number_format($totalValor, 0, ',', '.') }}</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-white custom-table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Nombre del Cliente o EMPRESA</th>
                                <th>Total Valor $</th>
                                <th>Observación</th>
                                <th>Valor</th>
                                <th>Numero de Orden</th>
                                <th>Correo del Cliente</th>
                                <th>Dirección del Cliente</th>
                                <th>Teléfono del Cliente</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($informes as $informe)
                                @php
                                    $matchingCliente = null;

                                    foreach ($clientes as $cliente) {
                                        $clienteDate = date('Y-m-d', strtotime($cliente->created_at));

                                        if ($informe->fecha == $clienteDate) {
                                            $matchingCliente = $cliente;
                                            break; // exit the loop once a match is found
                                        }
                                    }
                                @endphp

                                @if ($matchingCliente)
                                    <tr>
                                        <td>{{ $informe->fecha }}</td>
                                        <td class="font-size-large">{{ $matchingCliente->cliente_nombre }}</td>
                                        <td>{{ number_format($informe->total, 0, ',', '.') }}</td>
                                        <td>{{ $matchingCliente->observacion }}</td>
                                        <td>{{ number_format($matchingCliente->valor, 2, '.', ',') }}</td>
                                        <td>{{ $matchingCliente->num_factura }}</td>
                                        <td>{{ $matchingCliente->correo_cliente }}</td>
                                        <td>{{ $matchingCliente->direccion_cliente }}</td>
                                        <td>{{ $matchingCliente->telefono_cliente }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

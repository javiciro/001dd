@extends('adminlte::page')

@section('content')
    <div class="container-fluid mt-4">
        <h1 style="color: #1285AD;">Tesorería</h1>

        <form action="{{ url('/tesoreria') }}" method="get" class="mb-4">
            @csrf
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="start_date" style="color: #1285AD;">Fecha:</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="user_id" style="color: #1285AD;">Conductor:</label>
                    <select name="user_id" class="form-control">
                        <option value="" {{ !request('user_id') ? 'selected' : '' }}>Todos</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="search" style="color: #1285AD;">Buscar:</label>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" style="background-color: #1197D4; border-color: #1197D4;">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @if(count($datos) === 0)
            <div class="alert alert-info">
                No se encontraron registros.
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ url('/tesoreria') }}" class="btn btn-secondary" style="background-color: #FABC0B; border-color: #FABC0B; color: #ffffff;">Limpiar Filtros</a>
        </div>

        <p class="mb-3" style="color: #1285AD;">Suma de Valores: ${{ number_format($sumaValores, 2, '.', ',') }}</p>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Número de Factura</th>
                        <th>Correo del Cliente</th>
                        <th>Conductor</th>
                        <th>Fecha Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr class="{{ $dato->estado == 'pendiente' ? 'estado-pendiente' : '' }}">
                            <td>
                                <form action="{{ url('/tesoreria/editar-estado/'.$dato->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <select name="estado" class="form-control" onchange="confirmChangeState(this)"
                                            {{ $dato->estado == 'entregado' ? 'disabled' : '' }}>
                                        <option value="pendiente" {{ $dato->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="entregado" {{ $dato->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $dato->cliente_nombre }}</td>
                            <td>${{ number_format($dato->valor, 2, '.', ',') }}</td>
                            <td>{{ $dato->numero_factura }}</td>
                            <td>{{ $dato->correo_cliente }}</td>
                            <td>{{ $dato->user->name }}</td>
                            <td>{{ $dato->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <script>
        function confirmChangeState(selectElement) {
            if (selectElement.value === 'entregado' && !confirm('¿Cambiar estado?')) {
                selectElement.value = 'pendiente'; // Revert the selection if the user cancels
            }

            selectElement.form.submit();
        }
    </script>
@endsection

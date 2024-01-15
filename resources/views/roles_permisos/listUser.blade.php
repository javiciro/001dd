@extends('adminlte::page')

@section('content')
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <style>
        .card-header h3 {
            font-size: 28px;
            color: #1285AD; /* Change to the lighter blue color */
            text-transform: uppercase;
        }

        .card-header a.btn-success {
            background-color: #FABC0B; /* Change to yellow color */
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            margin-left: 10px;
        }

        .custom-bg-white {
            background-color: #ffffff; /* Change to white color */
        }

        .card {
            background-color: #ffffff; /* Change to white color */
        }

        .table {
            background-color: #ECF0F1; /* Change to a light gray color */
        }

        .table th,
        .table td {
            font-size: 16px;
        }

        .font-size-large {
            font-size: 18px;
        }

        .empty-row {
            text-align: center;
            font-weight: bold;
            color: #777;
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-white custom-bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Administración de Usuarios</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Table to display users -->
                            <table class="table table-bordered table-striped table-white">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('asignar.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                                    {{-- Verificar si el usuario tiene el rol "admin" --}}

                                                    <form action="{{ route('asignar.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

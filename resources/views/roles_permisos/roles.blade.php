@extends('adminlte::page')

@section('content')
<style>
    .card-header h3 {
        font-size: 28px;
        color: #3498db;
        text-transform: uppercase;
    }

    .card-header a.btn-success {
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        font-size: 18px;
        margin-left: 10px;
    }

    .table {
        background-color: #ecf0f1;
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

    .custom-bg-white {
        background-color: #ffffff;
        border-bottom: 1px solid #dee2e6;
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
    }

    .btn-warning:hover {
        background-color: #d78e0b;
        border-color: #d78e0b;
    }

    .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c23c2b;
        border-color: #c23c2b;
    }

</style>

<div class="container main-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-white custom-bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Gestión de Roles</h3>
                        <a href="{{ route('roles.create') }}" class="btn btn-success">Agregar Rol</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($roles->isEmpty())
                            <p class="empty-row">No hay roles registrados.</p>
                        @else
                            <table class="table table-bordered table-striped table-white">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                                    
                                                    @can('eliminar_rol')
                                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este rol?')">Eliminar</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No hay roles registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $(".table-row").hover(function () {
            $(this).css("cursor", "pointer");
        });

        $(".table-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>
@endsection

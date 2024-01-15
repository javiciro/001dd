@extends('adminlte::page')

@section('content')
<style>
    .card-header h3 {
        font-size: 28px;
        color: #3498db;
        text-transform: uppercase;
    }

    .card-header a.btn-primary {
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        font-size: 18px;
    }

    .card {
        background-color: #fff;
    }

    .table {
        background-color: #ecf0f1;
    }

    .table th,
    .table td {
        font-size: 16px;
    }

    .empty-row {
        text-align: center;
        font-weight: bold;
        color: #777;
    }

    .custom-alert {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gestión de Permisos</h3>
                    <div class="card-tools">
                        <a href="{{ route('permisos.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalPurple">Agregar permiso</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->id }}</td>
                                        <td>{{ $permiso->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('permisos.edit', $permiso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                                
                                                @can('editar_permiso')
                                                    <form action="{{ route('permisos.destroy', $permiso->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este permiso?')">Eliminar</button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary" icon="fas fa-bolt" size='lg' disable-animations>
    <form action="{{ route('permisos.store') }}" method="POST">
        @csrf
        <div class="row">
            <x-adminlte-input name="nombre" label="Nombre" placeholder="Ingrese el nombre del permiso" fgroup-class="col-md-6" disable-feedback/>
        </div>
        <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-key"/>
    </form>

    <x-slot name="footerSlot">
        <x-adminlte-button theme="danger" label="Cerrar" data-dismiss="modal" class="m-1"/>
    </x-slot>
</x-adminlte-modal>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
        $(".custom-alert").delay(5000).slideUp(300, function() {
            $(this).alert('close');
        });
    });
</script>

@endsection

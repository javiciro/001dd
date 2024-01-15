@extends('adminlte::page')

@section('content')
<style>
    .card-header h3 {
        font-size: 28px;
        color:  #3498db;
        text-transform: uppercase;
    }

    .card-header a.btn-primary {
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        font-size: 18px;
    }

    .card {
        background-color: #fff; /* Set the background color of the card to white */
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card">
                <div class="card-header">
                    <h3 class="card-title">Editar Permiso</h3>
                    <div class="card-tools">
                        <a href="{{ route('permisos.index') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Formulario de edición -->
                    <form action="{{ route('permisos.update', $permiso->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre del Permiso:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $permiso->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

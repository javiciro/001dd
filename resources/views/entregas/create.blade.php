@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Registrar Nuevo Cliente</h2>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="registroForm" action="{{ route('conductores.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="num_placa">Seleccione Placa del Vehiculo:</label>
                            <select name="num_placa" class="form-control" required>
                                <option value="" disabled selected>Seleccione </option>
                                @foreach($placas as $placa)
                                    <option value="{{ $placa->placa }}">{{ $placa->placa }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="cliente_nombre">Nombre del Cliente o Empresa:</label>
                            <input type="text" name="cliente_nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="numero_factura">Numero De Factura:</label>
                            <input type="text" name="numero_factura" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="observacion">Observación:</label>
                            <textarea name="observacion" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="valor">Valor (COP):</label>
                            <input type="text" name="valor" class="form-control" oninput="formatNumber(this)" required>
                        </div>

                        <div class="form-group">
                            <label for="num_factura">Numero De Recibo Provicional:</label>
                            <input type="text" name="num_factura" class="form-control" value="{{ $numFactura }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="correo_cliente">Correo del Cliente:</label>
                            <input type="email" name="correo_cliente" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion_cliente">Dirección del Cliente:</label>
                            <input type="text" name="direccion_cliente" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telefono_cliente">Teléfono del Cliente:</label>
                            <input type="tel" name="telefono_cliente" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary" onclick="validarFormulario()">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validarFormulario() {
        var clienteNombre = document.getElementsByName('cliente_nombre')[0].value;
        var valor = document.getElementsByName('valor')[0].value;
        var correoCliente = document.getElementsByName('correo_cliente')[0].value;
        var telefonoCliente = document.getElementsByName('telefono_cliente')[0].value;

        // Verificar si los campos requeridos están llenos
        if (!clienteNombre || !valor || !correoCliente) {
            alert('Por favor, completa todos los campos antes de guardar.');
        } else {
            // Validar que el valor sea numérico antes de enviar el formulario
            if (isNaN(parseFloat(valor))) {
                alert('El campo "Valor" debe ser un número.');
            } else {
                // Validar que el teléfono solo contenga dígitos
                if (!/^\d+$/.test(telefonoCliente)) {
                    alert('El campo "Teléfono" solo puede contener números.');
                } else {
                    // Form is valid, submit the form
                    document.getElementById('registroForm').submit();
                }
            }
        }
    }

    function formatNumber(input) {
        var value = input.value.replace(/[,.]/g, '');
        value = Number(value).toLocaleString('es-CO');
        input.value = value;
    }
</script>


@endsection

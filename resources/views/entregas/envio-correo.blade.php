<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Entrega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'cursive', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            position: relative;
        }

        .bg-lightblue {
            background-color: #3586dc;
            width: 100%;
            padding: 20px;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        h1 {
            color: #fff;
            font-size: 36px;
            text-align: center;
            margin: 0;
        }

        h5 {
            font-size: 24px;
            color: #3586dc;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }

        .invoice-info {
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .observation {
            margin-top: 20px;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
            border-radius: 10px;
        }

        .company-info {
            font-size: 18px;
            color: #555;
            margin-top: 20px;
        }

        @keyframes neon-glow {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #ff6b6b, 0 0 15px #fff, 0 0 20px #ff6b6b, 0 0 25px #fff;
            }

            to {
                text-shadow: 0 0 10px #fff, 0 0 20px #ff6b6b, 0 0 30px #fff, 0 0 40px #ff6b6b, 0 0 50px #fff;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="bg-lightblue">
            <h1 class="text-custom-orange">RECIBO PROVISIONAL UNIVERSAL</h1>
        </div>

        <div class="invoice-info">
            <div class="logo-container">
                <img src="{{ asset('imagenes/logo.jpg') }}" alt="Logo de la empresa" class="logo">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5>DETALLE DEL RECIBO:</h5>
                    <p>Cliente o Empresa: {{ $cliente->cliente_nombre }}</p>
                    <p>Teléfono: {{ $cliente->telefono_cliente }}</p>
                    <p>Correo: {{ $cliente->correo_cliente }}</p>
                </div>
                <div class="col-md-6">
                    <p>Fecha de Creación: {{ $cliente->created_at }}</p>
                    <p>Número de Orden: {{ $cliente->num_factura }}</p>
                </div>
            </div>

            <div class="company-info">
                <h5>Papelería Universal:</h5>
                <p>Número de Teléfono: 889 11 90</p>
                <p>Dirección: Cra 9 11-04</p>
                <p>Punto de Venta: Centro A</p>
            </div>
        </div>

        <div class="observation">
            <h5>Observación:</h5>
            <p>{{ $cliente->observacion }}</p>
        </div>

        <div class="total">
            <h5>Valor del pedido: ${{ number_format($cliente->valor, 0, '.', ',') }}</h5>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0; /* Ajuste para eliminar márgenes predeterminados */
            padding: 0; /* Ajuste para eliminar relleno predeterminado */
        }

        .bg-cover {
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
            margin: 0; /* Asegúrate de que no haya márgenes en la imagen */
            padding: 0; /* Asegúrate de que no haya relleno en la imagen */
        }

        @media (min-width: 768px) {
            .bg-cover {
                height: 100vh;
                width: 50%; /* Restaurado para ocupar el 50% del ancho de la pantalla en pantallas más grandes */
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12 bg-cover" style="background-image: url('vendor/adminlte/dist/img/logo006.jpg');">
                <!-- Contenido izquierdo -->
            </div>

            <div class="col-md-6 col-sm-12 p-4">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña que te permitirá elegir una nueva.') }}
                </div>

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Enviar Enlace de Restablecimiento de Contraseña por Correo Electrónico') }}
                    </button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

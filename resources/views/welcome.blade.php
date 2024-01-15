<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HH</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    <body class="antialiased">


        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <title>Iniciar sesión</title>
            <style>
                body {
                    margin: 0;
                    font-family: Arial, sans-serif;
                    display: flex;
                    height: 100vh;
                }
        
                .left-side {
                    flex: 1;
                    background: url('vendor/adminlte/dist/img/logo006.jpg') no-repeat center center fixed;
                    background-size: cover;
                    display: none; /* Ocultar la imagen por defecto */
                }
        
                @media (min-width: 768px) {
                    /* Mostrar la imagen en dispositivos más grandes (tabletas y escritorios) */
                    .left-side {
                        display: block;
                    }
                }
        
                .right-side {
                    flex: 1;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
        
                .login-form {
                    background: rgba(255, 255, 255, 0.8);
                    padding: 20px;
                    border-radius: 10px;
                    width: 100%;
                    max-width: 600px;
                }
        
                .tealwin-error {
                    color: red;
                    text-align: center;
                    padding: 10px;
                }
        
                /* Aumenté el tamaño de la fuente para el formulario */
                .login-form h2 {
                    font-size: 2.5rem;
                }
        
                /* Aumenté el tamaño de la fuente para las etiquetas y entradas de formulario */
                .login-form label, .login-form input, .login-form .form-check-label {
                    font-size: 1.2rem;
                }
        
                /* Estilos adicionales para hacer el formulario más adaptable */
                @media (max-width: 767px) {
                    .login-form {
                        padding: 10px; /* Reducir el espacio en dispositivos más pequeños */
                    }
        
                    .login-form h2 {
                        font-size: 2rem; /* Ajustar tamaño de fuente para dispositivos más pequeños */
                    }
                }
        
            </style>
        </head>
        <body>
        
            <div class="left-side"></div>
        
            <div class="right-side">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="login-form">
        
                                <!-- Mensaje de error general -->
                                @if(session('error'))
                                    <div class="tealwin-error">
                                        {{ session('error') }}
                                    </div>
                                @endif
        
                                <div class="text-center mb-4">
                                    <h2 class="text-3xl font-extrabold text-dark">
                                        Iniciar sesión
                                    </h2>
                                </div>  
                                
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
        
                                    <!-- Mensajes de error específicos para campos -->
                                    @error('email')
                                        <div class="tealwin-error">Correo electrónico  o contraseña incorrecta </div>
                                    @enderror
        
                                    @error('password')
                                        <div class="tealwin-error">Contraseña incorrecta</div>
                                    @enderror
        
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                                    </div>
        
                                    <div class="mb-3 form-check">
                                        <input id="remember_me" name="remember" type="checkbox" class="form-check-input">
                                        <label class="form-check-label" for="remember_me">Recordarme</label>
                                    </div>
        
                                    <div class="mb-3">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="font-semibold text-dark">Registrarse</a>
                                        @endif
        
                                        @if (Route::has('password.request'))
                                            <a class="text-dark" href="{{ route('password.request') }}">
                                                ¿Olvidaste tu contraseña?
                                            </a>
                                        @endif
                                    </div>
        
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
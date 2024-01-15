<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="min-h-screen d-flex bg-light">
        <!-- Image on the left side -->
        <div class="">
                <img style="width: 100%; height: 100vh"  class="" src="vendor/adminlte/dist/img/logo006.jpg" alt="" srcset="">
        </div>
        {{-- <div class="w-50 bg-cover bg-center"
            style="background-image: url('vendor/adminlte/dist/img/logo006.jpg'); height: 100vh"></div> --}}

        <!-- Form on the right side -->
        <div class="w-50 d-flex align-items-center justify-content-center">
            <div class="max-w-md w-100 p-4 bg-white rounded-md shadow-md">
                <!-- Registration Form -->
                <div class="text-center mb-4">
                    <h2 class="text-3xl font-extrabold text-dark">
                        Registrarse
                    </h2>
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                    </div>

                    <div class="mb-3">
                        <x-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autocomplete="username" />
                    </div>

                    <div class="mb-3">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="new-password" />
                    </div>

                    <div class="mb-3">
                        <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                        <x-input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mb-3 form-check">
                            <x-checkbox name="terms" id="terms" class="form-check-input" required />
                            <x-label for="terms" class="form-check-label">
                                {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline">Términos de servicio</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline">Política de privacidad</a>',
                                ]) !!}
                            </x-label>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-4">
                        <div>
                            <a class="text-decoration-none text-sm text-gray-600" href="{{ route('login') }}">
                                {{ __('¿Ya estás registrado?') }}
                            </a>
                        </div>

                        <div>
                            <!-- Use Bootstrap button styles -->
                            <button type="submit" class="btn btn-primary">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

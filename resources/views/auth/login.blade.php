<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="icon" href="imagenes/favicon.png" type="image/png">
    @vite(['resources/css/iniciarSesion.css'])
</head>

<body>
    <div class="caja">
        <h1>Terranova</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input id="email" placeholder="Correo Electrónico" type="email"
                class="inputs @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" placeholder="Contraseña" type="password"
                class="inputs @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="botones">
                {{ __('Iniciar Sesion') }}
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Olvide mi contraseña') }}
                </a>
            @endif
            <input class="linea" type="text">
            <button class="botones"><a href="{{ route('register') }}">Registrate</a></button>
        </form>
    </div>
</body>

</html>
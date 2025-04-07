<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @vite(['resources/css/registro.css'])
</head>

<body>
    <div class="caja">
        <h1>Regístrate y prueba nuestros servicios</h1>
        <button class="Google">Iniciar sesión con Google</button>
        <p class="o">O</p>
        <form method="POST" action="{{ route('register')}}">
            @csrf
            <div class="row">
                <input id="name" type="text" placeholder="Nombre" class="nombres @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <input id="apellido" type="text" placeholder="Apellido"
                    class="nombres @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}"
                    required autocomplete="apellido" autofocus>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <select class="TipoID" id="tipoID" required name="tipoDocumento">
                <option selected disabled>Tipo de identificación</option>
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="CE">Cédula de Extranjería</option>
                <option value="NIT">NIT</option>
                <option value="P">Pasaporte</option>
            </select>
            <input id="numeroID" type="tel" placeholder="Número de identificación" required name="documentoUsuario">
            <input id="telefono" type="tel" placeholder="Teléfono" required name="telefono">

            <input id="email" placeholder="Correo Electronico" type="email" class="@error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="password" placeholder="Contraseña" type="password"
                class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="col-md-6">
                <input id="password-confirm" type="password" placeholder="Confirma la Contraseña" name="password_confirmation" required autocomplete="new-password">
            </div>
            <input class="fecha" id="fechaNacimiento" type="date" placeholder="Fecha de nacimiento" required
                name="nacimiento">
            <select class="rol" id="rol" required name="rolUsuario">
                <option selected disabled>Rol</option>
                <option value="C">Comprador</option>
                <option value="V">Vendedor</option>
            </select>
            <input class="botoncheck" id="terms" type="checkbox" required>
            <label for="terms">Acepto los términos y condiciones</label>
            <div class="error" id="error"></div>
            <button type="submit" class="registrarse">
                {{ __('Registrate Ahora') }}
            </button>
    </div>
    @vite(['resources/js/registro.js'])
</body>

</html>
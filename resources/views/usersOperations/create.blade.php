<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Laradex</title>

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>

</head>
<body>

<h1 class="display-4">CREAR USUARIO</h1>

<hr>
<br>

<form class="bg-white shadow rounded" method="POST" action="{{ route('users-store') }}">
    @csrf
    <div class="form-group">
        <label for="email"> Correo </label>
        <input name="email" type="email">
    </div>

    <div class="form-group">
        <label for="password"> Contraseña </label>
        <input name="password" type="password">
    </div>

    <div class="form-group">
        <label for="rol"> Rol </label>
        <select name="rol">
            <option>Estudiante</option>
            <option>Profesor</option>
            <option>Secretaria</option>
            <option>Encargado Titulación</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>
    <a class="btn btn-link" href="{{route('home')}}">Cancelar</a>

</form>

</body>
</html>

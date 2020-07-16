<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Laradex</title>

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>

</head>
<body>

<h1 class="display-4">CREAR BITACORA</h1>

<hr>
<br>

<form class="bg-white shadow rounded" method="POST" action="{{ route('bitacoras-store') }}">
    @csrf
    <div class="form-group">
        <label for="titulo"> Nombre Bitacora </label>
        <input name="titulo" type="text">
    </div>

    <div class="form-group">
        <label for="id_estudiante"> ID estudiante</label>
        <input name="id_estudiante" type="number">
    </div>

    <div class="form-group">
        <label for="id_profesor"> ID profesor</label>
        <input name="id_profesor" type="number">
    </div>

   

    <button type="submit" class="btn btn-primary">Crear</button>
    <a class="btn btn-link" href="{{route('home')}}">Cancelar</a>

</form>

</body>
</html>
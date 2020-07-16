@extends('helpers.template')

@section('title_head', 'Crear Usuario')

@section('content_body')

    <div class="container" style=".container { background: gray; min-height: 80vh; }">

        @extends('helpers.validate_errors')

        <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('users-store') }}">
            @csrf
            <h2>Crear Usuario</h2>

            <div>
                <label for="name"> Nombre </label>
                <input class="form-control shadow-sm" name="name" type="text">
            </div>

            <div class="form-group">
                <label for="email"> Correo </label>
                <input class="form-control shadow-sm" name="email" type="email" required>
            </div>

            <div>
                <label for="name"> Rut </label>
                <input class="form-control shadow-sm" name="rut" type="text">
            </div>

            <div class="form-group">
                <label for="password"> Contraseña </label>
                <input class="form-control shadow-sm" name="password" type="password" required>
            </div>

            <div class="form-group">
                <label for="rol"> Rol </label>
                <select class="form-control shadow-sm" name="rol">
                    <option>Estudiante</option>
                    <option>Profesor</option>
                    <option>Secretaria</option>
                    <option>Encargado Titulación</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Crear</button>
            <a class="btn btn-link btn-block" href="{{route('home')}}">Cancelar</a>

        </form>

    </div>

@endsection

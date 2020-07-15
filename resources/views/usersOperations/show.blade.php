@extends('helpers.template')

@section('title_head', 'Usuario | '.$user->name)

@section('content_body')

    <div class="container" style=".container { background: gray; min-height: 80vh; }">

        <a class="btn btn-outline-secondary mb-4" href="{{ route('users-index') }}">
            Regresar
        </a>

        <h3> Nombre: {{ $user->name }} | Correo: {{ $user->email }}</h3>

        <p class="lead text-secondary">
            Rut: {{ $user->rut}}
        </p>

        <p class="lead text-secondary">
            Carrera: {{ $user->carrera}}
        </p>

        <p class="lead text-secondary">
            Rol: {{ $user->rol}}
        </p>

        <p class="lead text-secondary">
            Rol Secundario: {{ $user->rol_secundario}}
        </p>

        <p class="lead text-secondary">
            Estado: {{ $user->estado}}
        </p>

        <p class="text-black-50">
            <small> Registrado {{$user->created_at->diffForHumans() }}</small>
        </p>

        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('users-edit', $user) }}"> Editar </a>

                <form method="POST" action="{{ route('users-remover', $user) }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="estado" value="Removido">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </div>
        </div>

    </div>

@endsection

@extends('helpers.template')

@section('title_head', 'Usuario | '.$user->name)

@section('content_body')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif

                        <div class="card">
                            <h5 class="card-header">Featured</h5>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                        {{ __('You are logged in!') }}
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user()->rol == ('Encargado Titulación' or 'Secreataria') )
                        <div class="card-body">
                            <a href="{{ route('bitacoras-create') }}">Crear Bitacoras</a>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('bitacoras-index') }}">Bitacoras Activas</a>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')
                        <div class="card-body">
                            <a href="{{ route('users-create') }}">Crear Usuario</a>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('users-index') }}">Usuarios Activos</a>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('users-deleteds')  }}">Usuarios Removidos</a>
                        </div>
                    @endif

                    <div class="card-body">
                        <h4> Hello {{ auth()->user()->email }}</h4>
                    </div>


                </div>
            </div>
        </div>


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
                    <a class="btn btn-danger" data-toggle="modal" data-target="#eliminarUsuario" type="submit">
                        Eliminar
                    </a>

                    <!-- Modal | Mensaje de alerta para confirmacion de eliminacion de un usuario -->
                    @include('helpers.modalEliminarUsuario')

                </form>
            </div>
        </div>
    </div>

@endsection

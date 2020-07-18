@extends('helpers.template')

@section('title_head', 'Home')

@section('content_body')
    <div class="container">

        <div class="card-deck my-3 text-center">

            <!-- TITULO Y BIENVENIDA AL USUARIO -->

            <div class="card my-4 box-shadow">
                <div class="card-header bg-dark py-4">
                    <h3 class="my-0 font-weight-normal text-light"> Bienvenido Administrador </h3>
                </div>
                <div class="card-body">
                    <h4 class="card-title pircing-card-title py-4"> ¡Bienvenid@ <span
                            class="text-primary">{{ auth()->user()->email }}</span> al menú para Administradores! <br>
                        Desde aquí puedes realiza todas tus operacciones de a cuerdo a tu rol.
                    </h4>
                </div>
            </div>
        </div>

        <!-- OPERACIONES DISPONIBLES PARA EL ADMIN -->

        @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')

            <div class="card-deck my-3 text-center">

                <div class="card mb-3 box-shadow">
                    <div class="card-header bg-primary">
                        <h5 class="my-0 font-weight-normal text-light"> Administrador </h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pircing-card-title"> Crear un Usuario</h3>
                        <p class="text-muted"> Crear un usuario con los datos minimos; correo, rol y contraseña</p>
                    </div>
                    <a href="{{ route('users-create') }}" class="btn m-3 btn-outline-primary rounded-pill">¡A Crear!</a>
                </div>

                <div class="card mb-3 box-shadow">
                    <div class="card-header bg-success">
                        <h5 class="my-0 font-weight-normal text-light">Administrador</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pircing-card-title">Ver Usuarios Activos</h3>
                        <p class="text-muted"> Para cada usuario esta la posibilidad de modificar sus datos y
                            eliminarlo</p>
                    </div>
                    <a href="{{ route('users-index') }}" class="btn m-3 btn-outline-success rounded-pill">¡Ir a ver!</a>
                </div>

                <div class="card mb-3 box-shadow">
                    <div class="card-header bg-danger">
                        <h5 class="my-0 font-weight-normal text-light">Administrador</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pircing-card-title">Ver Usuarios Removidos</h3>
                        <p class="text-muted"> Lista de todos los usuarios removidos hasta el momento. Tambien se pueden
                            editar.</p>
                    </div>
                    <a href="{{ route('users-deleteds')  }}" class="btn m-3 btn-outline-danger rounded-pill">¡A
                        revisar!</a>
                </div>
            </div>
        @endif

    <!-- TOPERACIONES DISPONIBLES PARA LA SECRETARIA -->

        @if(\Illuminate\Support\Facades\Auth::user()->rol == ('Encargado Titulación' or 'Secreataria') )

            <div class="card-deck my-3 text-center">

                <div class="card mb-4 box-shadow">
                    <div class="card-header bg-primary">
                        <h5 class="my-0 font-weight-normal text-light"> Secretaria </h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pircing-card-title"> Crear una Bitacora</h3>
                        <p class="text-muted"> Crear bitacora con los Estudiantes y Profesores necesarios</p>
                    </div>
                    <a href="{{ route('bitacoras-create') }}" class="btn m-3 btn-outline-primary rounded-pill">¡A
                        Crear!</a>
                </div>

                <div class="card mb-4 box-shadow">
                    <div class="card-header bg-success">
                        <h5 class="my-0 font-weight-normal text-light"> Secretaria</h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pircing-card-title">Ver Bitacoras</h3>
                        <p class="text-muted"> Analizar todos los datos asignados a una Bitacora. Tambien se pueden
                            editar</p>
                    </div>
                    <a href="{{ route('bitacoras-index') }}" class="btn m-3 btn-outline-success rounded-pill">¡Ir a
                        ver!</a>
                </div>

                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h5 class="my-0 font-weight-normal text-light"> - </h5>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pircing-card-title"></h3>
                        <p class="text-muted"></p>
                    </div>
                    <button disabled class="btn m-3 btn-outline-danger rounded-pill"> -</button>
                </div>
            </div>
        @endif

    </div>

@endsection

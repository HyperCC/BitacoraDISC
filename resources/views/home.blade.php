@extends('helpers.template')

@section('title_head', 'Home')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-lg-6">

                <div class="card-deck my-3 text-center">

                    <!-- TITULO Y BIENVENIDA AL USUARIO -->

                    <div class="card my-4 box-shadow">
                        <div class="card-header bg-dark py-4">
                            <h3 class="my-0 font-weight-normal text-light"> Bienvenido {{auth()->user()->rol}} </h3>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title pircing-card-title py-4"> ¡Bienvenid@ <span
                                    class="text-primary">{{ auth()->user()->email }}</span> al menú para
                                {{auth()->user()->rol}}!
                                <br>
                                Desde aquí puedes realiza todas tus operacciones de acuerdo a tu rol.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <img class="img-fluid m-lg-3 m-sm-3" src="img/admin_view.svg" alt="administracion bitacora ucn">
            </div>
        </div>

        <!-- OPERACIONES DISPONIBLES PARA EL ADMIN -->

        <div class="row">

            <div class="card-deck my-3 text-center">

                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card mb-3 box-shadow">
                            <div class="card-header bg-primary">
                                <h5 class="my-0 font-weight-normal text-light"> Administrador </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pircing-card-title"> Crear nuevo Usuario</h3>
                                <p class="text-muted"> Crear un usuario con los datos minimos; correo, rol y
                                    contraseña</p>
                            </div>
                            <a href="{{ route('users-create') }}"
                               class="btn m-3 btn-outline-primary btn-lg rounded-pill">
                                ¡A Crear!
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card mb-3 box-shadow">
                            <div class="card-header bg-success">
                                <h5 class="my-0 font-weight-normal text-light">Administrador</h5>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pircing-card-title">Ver Usuarios Activos</h3>
                                <p class="text-muted"> Para cada usuario esta la posibilidad de modificar sus datos y
                                    eliminarlo</p>
                            </div>
                            <a href="{{ route('users-index') }}"
                               class="btn m-3 btn-outline-success btn-lg rounded-pill">
                                ¡Ir a ver!
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card mb-3 box-shadow">
                            <div class="card-header bg-danger">
                                <h5 class="my-0 font-weight-normal text-light">Administrador</h5>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pircing-card-title">Ver Usuarios Removidos</h3>
                                <p class="text-muted"> Lista de todos los usuarios removidos hasta el momento. Tambien
                                    se pueden editar.</p>
                            </div>
                            <a href="{{ route('users-deleteds')  }}"
                               class="btn m-3 btn-outline-danger btn-lg rounded-pill">
                                ¡A revisar!
                            </a>
                        </div>
                    </div>
                @endif

            <!-- TOPERACIONES DISPONIBLES PARA LA SECRETARIA, ENCARGADO, ADMIN -->

                @if(\Illuminate\Support\Facades\Auth::user()->rol !==('Profesor') and \Illuminate\Support\Facades\Auth::user()->rol !== ('Estudiante'))

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header bg-primary">
                                <h5 class="my-0 font-weight-normal text-light"> Administrador/ Encargado Titulación/
                                    Secretaria </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pircing-card-title"> Crear una Bitacora</h3>
                                <p class="text-muted"> Crear bitacora con los Estudiantes y Profesores necesarios</p>
                            </div>
                            <a href="{{ route('bitacoras-create') }}"
                               class="btn m-3 btn-outline-primary btn-lg rounded-pill">
                                ¡A Crear!
                            </a>
                        </div>
                    </div>

                @endif

            <!-- CUALUIER AUTENTICADO PUEDE VER LAS BITACORAS CORRESPONDIENTES-->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header bg-success">
                            <h5 class="my-0 font-weight-normal text-light"> Todos </h5>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title pircing-card-title">Ver Bitacoras</h3>
                            <p class="text-muted"> Analizar todos los datos asignados a una Bitacora. Tambien se pueden editar segun rol
                            </p>
                        </div>
                        <a href="{{ route('bitacoras-index') }}"
                           class="btn m-3 btn-outline-success btn-lg rounded-pill">
                            ¡Ir a ver!
                        </a>
                    </div>
                </div>

                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante' or \Illuminate\Support\Facades\Auth::user()->rol=='Admin' )
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header bg-primary">
                                <h5 class="my-0 font-weight-normal text-light"> Estudiante </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pircing-card-title"> Ingresar nuevo avance</h3>
                                <p class="text-muted"> Crear registro de un avance semanal para la Bitacora
                                    corespondiente </p>
                            </div>
                            <a href="{{ route('avances-create') }}"
                               class="btn m-3 btn-outline-primary btn-lg rounded-pill">
                                ¡A Crear!
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header bg-primary">
                                <h5 class="my-0 font-weight-normal text-light"> Estudiante </h5>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title pircing-card-title"> Adjuntar evidencia</h3>
                                <p class="text-muted"> Se puede adjuntar evidencia a un avance semanal registrado
                                    previamente</p>
                            </div>
                            <a href="{{ route('evidencia-create') }}"
                               class="btn m-3 btn-outline-primary btn-lg rounded-pill">
                                ¡A Crear!
                            </a>
                        </div>
                    </div>

                @endif

            </div>
        </div>

    </div>

@endsection

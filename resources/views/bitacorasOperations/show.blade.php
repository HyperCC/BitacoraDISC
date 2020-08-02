@extends('helpers.template')

@section('title_head', 'Bitacora | '.$bitacora->name)

@section('content_body')

    <div class="container text-center">

        <p class="display-4"> Datos Bitacora {{ $bitacora->titulo }}</p>
        <br>

        <div class="row my-4">

            <div class="col-12 col-lg-6">
                <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/organizer.svg" alt="actividades bitacora ucn">
            </div>

            <div class="col-12 col-lg-6 mb-3">
                <div class="card shadow-sm">

                    <div class="card-body">

                        <div class="card px-3">

                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text">Titulo</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $bitacora->titulo }} </p>
                            </div>
                        </div>

                        <div class="card px-3">

                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <p class="input-group-text"> Estado</p>
                                </div>
                                <p class="form-control" aria-describedby="basic-addon3"> {{ $bitacora->estado }} </p>
                            </div>
                        </div>

                        @if($bitacora->estado == 'Finalizada')
                            <div class="card px-3">

                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <p class="input-group-text"> Causa Renuncia</p>
                                    </div>
                                    <p class="form-control"
                                       aria-describedby="basic-addon3"> {{ $bitacora->causa_renuncia }} </p>
                                </div>
                            </div>
                        @endif

                        <div class="py-3">
                            <a class="btn btn-lg btn-outline-warning btn-block rounded-pill mb-2 text-dark"
                               href="{{ route('bitacoras-edit', $bitacora) }}"> Editar </a>

                            <form method="POST" action="{{ route('bitacoras-remover', $bitacora) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="estado" value="Removido">
                                <a class="btn btn-lg btn-outline-danger btn-block rounded-pill" data-toggle="modal"
                                   data-target="#finalizarBitacora"
                                   type="submit">
                                    Finalizar
                                </a>

                                <!-- Modal | Mensaje de alerta para confirmacion de eliminacion de un usuario -->
                                @include('helpers.modalFinalizarBitacora')

                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <h2 class="mx-auto mt-lg-3"> Profesores: </h2>
            <table class="table table-hover table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Rol</th>
                    <th scope="col"> Ver</th>
                </tr>
                </thead>

                <tbody>
                @forelse($bitacora->users as $us)
                    @if($us->rol == 'Profesor' or $us->rol =='Encargado Titulación')
                        <tr>
                            <td> {{ $us->name }}</td>
                            <td> {{ $us->email }}</td>
                            <td> {{ $us->rol }}</td>
                            <td><a href="{{route('users-show', $us)}}" class="btn btn-success px-3"> Ver</a></td>
                        </tr>
                    @endif

                @empty
                    <tr>
                        <th> No hay ningún Profesor asociado a esta Bitacora</th>
                    </tr>
                @endforelse
                </tbody>

            </table>
            <br>

            <h2 class="mx-auto mt-lg-3"> Alumnos: </h2>
            <table class="table table-hover table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Rol</th>
                    <th scope="col"> Ver</th>
                </tr>
                </thead>

                <tbody>
                @forelse($bitacora->users as $us)
                    @if($us->rol == 'Estudiante')
                        <tr>
                            <td> {{ $us->name }}</td>
                            <td> {{ $us->email }}</td>
                            <td> {{ $us->rol }}</td>
                            <td><a href="{{route('users-show', $us)}}" class="btn btn-success px-3"> Ver</a></td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <th> No hay ningún Alumno asociado a esta Bitacora</th>
                    </tr>
                @endforelse
                </tbody>

            </table>
            <br>

            <h2 class="mx-auto mt-lg-3"> Evidencias: </h2>

        </div>
    </div>

@endsection

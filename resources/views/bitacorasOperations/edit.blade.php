@extends('helpers.template')
@section('title_head', 'Editar Bitacora')
@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                <div class="bg-white py-3 px-4 shadow rounded">

                    <form method="POST"
                          action="{{ route('bitacoras-update', $bitacora) }}">

                        @csrf
                        @method('PATCH')

                        <div class="text-center">
                            <span class="display-3">Editar una Bitacora</span>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label class="ml-1" for="name"><h5>Titulo</h5></label>
                            <input class="form-control shadow-sm bg-light" name="titulo" type="text"
                                   value="{{ old('titulo', $bitacora->titulo) }}">
                        </div>
                    </form>

                    <br>

                    <!-- TABLAS DE PROFESORES -->
                    <div class="mx-auto">

                        <h5 class="mt-lg-3"> Profesores actuales: </h5>
                        <table class="table table-hover table-responsive-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Rol</th>
                                <th scope="col"> Accion</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($bitacora->users as $us)
                                @if($us->rol == 'Profesor' or $us->rol =='Encargado Titulación')
                                    <tr>
                                        <td> {{ $us->name }}</td>
                                        <td> {{ $us->email }}</td>
                                        <td> {{ $us->rol }}</td>

                                        <td><a href="#" class="btn btn-danger px-3"> Eliminar </a></td>
                                    </tr>
                                @endif

                            @empty
                                <tr>
                                    <th> No hay Profesores</th>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>

                    <!-- PROFESORES DISPONIBLES  -->
                    <div class="form-group">

                        <form action="#" method="post">
                            @csrf

                            <label for="id_estudiante1"><h5>Profesores disponibles:</h5></label>
                            <select class="form-control selectalumnos" name="id_estudiante1">

                                <option> Seleccione</option>
                                @forelse(\Illuminate\Support\Facades\DB::select('select * from users where rol=:rol', ['rol'=>'Profesor']) as $us)
                                    <option value="{{$us->id}}">
                                        {{$us->email}} ({{$us->name}})
                                    </option>
                                @empty
                                    <h4>No hay datos</h4>
                                @endforelse

                            </select>

                            <div class="row mx-auto mt-3">
                                <a href="#" class="col-4 btn btn-success mx-auto"> Agregar Profesor </a>
                            </div>

                        </form>

                    </div>
                    <br>
                    <hr>

                    <!-- TABLA DE ALUMNOS -->
                    <div class="mx-auto">
                        <h5 class="mt-lg-3"> Alumnos actuales: </h5>
                        <table class="table table-hover table-responsive-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Rol</th>
                                <th scope="col"> Accion</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($bitacora->users as $us)
                                @if($us->rol == 'Estudiante')
                                    <tr>
                                        <td> {{ $us->name }}</td>
                                        <td> {{ $us->email }}</td>
                                        <td> {{ $us->rol }}</td>
                                        <td><a href="#" class="btn btn-danger px-3"> Eliminar </a></td>

                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <th> No hay Alumnos</th>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>

                    <input type="hidden" value="{{ old('estado', $bitacora->estado) }}" name="estado">

                    @if($bitacora->estado=="Finalizada")
                        <div class="form-group">
                            <label class="form-check-label m-1">¿Desea reactivar esta Bitacora?</label>
                            <br>
                            <span class="ml-4">
                            <input class="form-check-input" type="checkbox" name="estado"
                                   value="Activa"> Si
                        </span>
                        </div>
                    @endif
                    <br>

                    <hr>

                    <div class="py-3">
                        <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit">
                            Guardar
                        </button>

                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill"
                           href="{{ route('bitacoras-index') }}"> Cancelar </a>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection

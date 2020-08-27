@extends('helpers.template')
@section('title_head', 'Editar Bitacora')
@section('content_body')

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        //Funcion Jquery que desactiva el boton guardar nuevos profes si en la lista esta seleccionado "seleccione"
        $(function() {
            $("#select_profe").change(function() {
                if ($(this).val() === "Seleccione") {
                    $("#btn_guardar").prop("disabled", true);
                } else {
                    $("#btn_guardar").prop("disabled", false);
                }
            });

        });

    </script>


    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">
                <div class="bg-white py-3 px-4 shadow rounded">

                    <form method="POST" action="{{ route('bitacoras-update', $bitacora) }}">

                        @csrf
                        @method('PATCH')

                        <div class="text-center">
                            <span class="display-3">Editar una Bitacora</span>
                        </div>

                        <hr>

                        <!-- CAMBIAR TITULO DE LA BITACORA  -->
                        <div class="form-group">
                            <label class="custom-select-lg ml-1" for="name">
                                <h5>Titulo</h5>
                            </label>
                            <input class="form-control shadow-sm bg-light" name="titulo" type="text"
                                value="{{ old('titulo', $bitacora->titulo) }}">
                        </div>

                        <input type="hidden" value="{{ old('estado', $bitacora->estado) }}" name="estado">

                        <!-- REACTIVACION DE LA BITACORA  -->
                        @if ($bitacora->estado == 'Finalizada')
                            <div class="form-group">
                                <label class="form-check-label custom-select-lg m-1">¿Desea reactivar esta
                                    Bitacora?</label>
                                <br>
                                <span class="ml-4">
                                    <input class="form-check-input" type="checkbox" name="estado" value="Activa"> Si</span>
                            </div>
                        @endif

                        <div class="py-3">
                            <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit">
                                Guardar Titulo @if ($bitacora->estado == 'Finalizada')- Estado
                                @endif
                            </button>
                        </div>

                        <br>
                        <hr>
                    </form>


                    <!-- TABLA DE ALUMNOS -->
                    <div class="mx-auto">
                        <h5 class="custom-select-lg mt-lg-3"> Alumnos actuales: </h5>
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
                                    @if ($us->rol == 'Estudiante')
                                        <tr>
                                            <td> {{ $us->name }}</td>
                                            <td> {{ $us->email }}</td>
                                            <td> {{ $us->rol }}</td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('bitacoras-borrar-relacion', $bitacora) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="user_id" value="{{ $us->id }}">
                                                    <button class="btn btn-danger px-3" type="submit"> Eliminar</button>
                                                </form>
                                            </td>

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

                    <!-- TABLAS DE PROFESORES -->
                    <div class="mx-auto">

                        <h5 class="custom-select-lg mt-lg-3"> Profesores actuales: </h5>
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
                                    @if ($us->rol == 'Profesor' || $us->rol == 'Encargado Titulación')
                                        <tr>
                                            <td> {{ $us->name }}</td>
                                            <td> {{ $us->email }}</td>
                                            <td> {{ $us->rol }}</td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('bitacoras-borrar-relacion', $bitacora) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="user_id" value="{{ $us->id }}">
                                                    <button class="btn btn-danger px-3" type="submit"> Eliminar</button>
                                                </form>
                                            </td>
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
                    <form method="POST" action="{{ route('bitacoras-store-profesor') }}">
                        @csrf

                        <input type="hidden" name="bitacora_id" value="{{ $bitacora->id }}">

                        <div class="form-group">
                            <label for="id_estudiante1">
                                <h5>Profesores disponibles para agregar:</h5>
                            </label>
                            <select class="form-control selectalumnos" name="id_profe" id="select_profe" @if ($bitaProfes > 1) disabled @endif>

                                <option class="text-capitalize"> Seleccione</option>
                                @forelse($profesores as $us)
                                    @if ($us->rol == 'Profesor' || $us->rol == 'Encargado Titulación')
                                        <option class="text-capitalize custom-select-lg" value="{{ $us->id }}">
                                            {{ $us->email }} ({{ $us->name }})
                                        </option>
                                    @endif
                                @empty
                                    <h4>No hay profesores disponibles</h4>
                                @endforelse

                            </select>
                        </div>
                        <br>


                        <div class="py-3">
                            <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit" id="btn_guardar" disabled>
                                Guardar Nuevos Profesores
                            </button>

                            <a class="btn btn-lg btn-block btn-outline-dark rounded-pill"
                                href="{{ route('bitacoras-index') }}"> Cancelar </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

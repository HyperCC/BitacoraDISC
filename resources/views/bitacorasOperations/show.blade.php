@extends('helpers.template')

@section('title_head', 'Bitacora | '.$bitacora->name)

@section('content_body')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function habilitaDeshabilita(form) {
            form.estado.checked == false;
            if (form.estado.checked == true) {
                form.causaRenuncia[0].disabled = false;
                form.causaRenuncia[1].disabled = false;
                form.btnRenuncia.disabled = false;
            }

            if (form.estado.checked == false) {
                form.causaRenuncia[0].disabled = true;
                form.causaRenuncia[1].disabled = true;
                form.btnRenuncia.disabled = true;
            }
        }
    </script>

    <script>
        function comprobar() {

            var pulsado = false;
            var opciones = document.formEnding.causaRenuncia;
            var elegido = -1;

            for (i = 0; i < opciones.length; i++) {
                if (opciones[i].checked == true) {
                    pulsado = true;
                    elegido = i;
                    break;
                }
            }

            if (pulsado) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <div class="container">

        <p class="display-4 text-center"> Datos Bitacora {{ $bitacora->titulo }}</p>
        <br>


        <div class="row my-4">

            @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante')
                @if($bitacora->estado == 'Finalizada' & $bitacora->causa_renuncia == 'Aprobación del término de trabajo')
                    <div class="mx-auto">
                        <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/graduation.svg"
                             alt="finalización de bitacora ucn">
                    </div>

                    <div class="display-3 text-center">
                        <p>Esta Bitacora ha llegado a su finalización debido a su aprobación. ¡Muchas felicidades!!!</p>
                    </div>

                @else

                    <div class="mx-auto">
                        <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/cancel.svg"
                             alt="finalización de bitacora ucn">
                    </div>

                    <div class="display-3 text-center">
                        <p>Esta Bitacora ha finaliza debido a la no continuidad del trabajo. Lo sentimos. </p>
                    </div>


                @endif

            @else

                <div class="col-12 col-lg-6">
                    <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/organizer.svg"
                         alt="actividades bitacora ucn">
                </div>

                <!-- DATOS PRINCIPALES SOBRE LA BITACORA-->
                <div class="col-12 col-lg-6 mb-3">
                    <div class="card shadow-sm">

                        <div class="card-body">
                            <div class="card px-3 text-center">

                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <p class="input-group-text">Titulo</p>
                                    </div>
                                    <p class="form-control"
                                       aria-describedby="basic-addon3"> {{ $bitacora->titulo }} </p>
                                </div>
                            </div>

                            <div class="card px-3 text-center">

                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <p class="input-group-text"> Estado</p>
                                    </div>
                                    <p class="form-control"
                                       aria-describedby="basic-addon3"> {{ $bitacora->estado }} </p>
                                </div>
                            </div>

                        @if( \Illuminate\Support\Facades\Auth::user()->rol!= 'Profesor')
                            <!-- EN CASO DE TENER LA BITACORA FINALIZADA -->
                                <div>
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

                                    @else

                                        <div class="mt-3">
                                            <!-- FORMULARIOS PARA INICIAR FINALIZACION DE BITACORA -->
                                            <form action="{{ route('bitacoras-remover', $bitacora) }}" method="POST"
                                                  class="form-group" name="formEnding" onsubmit="comprobar()">

                                                @csrf
                                                @method('PATCH')

                                                <div class="form-group">
                                                    <label class="form-check-label ml-1">¿Desea finalizar esta
                                                        Bitacora?</label>
                                                    <br>
                                                    <span class="ml-4">
                                        <input class="form-check-input" type="checkbox" value="Finalizada" name="estado"
                                               onClick="habilitaDeshabilita(this.form)"> Si </span>
                                                </div>

                                                <span class="ml-1">Por la siguiente razon:</span>

                                                <div class="form-group ml-4">

                                                    <input disabled checked class="form-check-input" type="radio"
                                                           name="causaRenuncia" value="No continuidad del trabajo">
                                                    <label class="form-check-label">No continuidad del trabajo</label>
                                                    <br>

                                                    <input disabled class="form-check-input" type="radio"
                                                           name="causaRenuncia"
                                                           value="Aprobación del término de trabajo">
                                                    <label class="form-check-label">Aprobación del término de
                                                        trabajo</label>

                                                </div>


                                                <!-- BOTON DE ENVIO DE FINALIZACION BITACORA -->
                                                <div>
                                                    <button class="btn btn-lg btn-outline-danger btn-block rounded-pill"
                                                            id="btnRenuncia" disabled="disabled"
                                                            data-toggle="modal" data-target="#finalizarBitacora"
                                                            type="submit">
                                                        Finalizar
                                                    </button>
                                                </div>

                                                <!-- Modal | Mensaje de alerta para confirmacion de eliminacion de un usuario -->

                                            </form>

                                        </div>
                                    @endif
                                </div>

                                <!-- BOTON PARA EDITAR LA BITACORA SELECCIONADA -->
                                <div>
                                    <a class="btn btn-lg btn-outline-warning btn-block rounded-pill mb-2 text-dark"
                                       href="{{ route('bitacoras-edit', $bitacora) }}">
                                        Editar
                                    </a>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>

                <!-- TABLAS DE PROFESORES -->
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
                                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante')
                                    <td><a href="#" class="btn btn-success px-3 disabled"> No disponible</a></td>
                                @else
                                    <td><a href="{{route('users-show', $us)}}" class="btn btn-success px-3"> Ver</a>
                                    </td>
                                @endif
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

                <!-- TABLA DE ALUMNOS -->
                <h2 class="mx-auto mt-lg-3"> Alumnos: </h2>
                <table class="table table-hover table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Rol</th>
                        <th scope="col"> Ver</th>
                    </tr>
<<<<<<< HEAD
                @endforelse
                </tbody>

            </table>
            <br>

            <!-- TABLAS DE PROFESORES -->
            <h2 class="mx-auto mt-lg-3"> Registros de Avances: </h2>
            <table class="table table-hover table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"> Fecha</th>
                    <th scope="col"> Ver</th>
                    <th scope="col"> Comentarios</th>
                </tr>
                </thead>

                <tbody>
                @forelse($bitacora->avances as $ava)
                    <tr>
                        <td>{{ $ava->user->name }}</td>
                        <td>{{ $ava->descripcion }}</td>
                        <td> {{ $ava->created_at }} </td>

                        @if($ava->evidencias->count() > 0)
                            <td><a href="{{ route('evidencia-index', $ava) }}" class="btn btn-success px-3">
                                    Evidencia</a></td>
                        @else
                            <td><a href="#" class="btn btn-success px-3 disabled">Sin Evidencias</a></td>
                        @endif

                       
                            <td><a href="{{ route('comentario-index',$ava) }}" class="btn btn-success px-3">
                                    Comentario</a></td>
                       
                            
                        
                            
                        
                    </tr>
=======
                    </thead>

                    <tbody>
                    @forelse($bitacora->users as $us)
                        @if($us->rol == 'Estudiante')
                            <tr>
                                <td> {{ $us->name }}</td>
                                <td> {{ $us->email }}</td>
                                <td> {{ $us->rol }}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante')
                                    <td><a href="#" class="btn btn-success px-3 disabled"> No disponible</a></td>
                                @else
                                    <td><a href="{{route('users-show', $us)}}" class="btn btn-success px-3"> Ver</a>
                                    </td>
                                @endif
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
>>>>>>> b76aeae34f98f8bd99e753cf0b88b301c90c43e7

                <!-- TABLAS DE PROFESORES -->
                <h2 class="mx-auto mt-lg-3"> Registros de Avances: </h2>
                <table class="table table-hover table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Estudiante</th>
                        <th scope="col">Descripción</th>
                        <th scope="col"> Fecha</th>
                        <th scope="col"> Ver</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($bitacora->avances as $ava)
                        <tr>
                            <td>{{ $ava->user->name }}</td>
                            <td>{{ $ava->descripcion }}</td>
                            <td> {{ $ava->created_at }} </td>

                            @if($ava->evidencias->count() > 0)
                                <td><a href="{{ route('evidencia-index', $ava) }}" class="btn btn-success px-3">
                                        Evidencia</a></td>
                            @else
                                <td><a href="#" class="btn btn-success px-3 disabled">Sin Evidencias</a></td>
                            @endif
                        </tr>

                    @empty
                        <tr>
                            <th> No hay ninguna evidencia registrada para esta Bitacora</th>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
                <br>

            @endif

        </div>
    </div>

@endsection

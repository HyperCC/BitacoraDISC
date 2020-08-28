@extends('helpers.template')

@section('title_head', 'Crear Avance')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">
                @if(\Illuminate\Support\Facades\Auth::user()->disponibilidad == 'Si')
                    <h1 class="text-center">No tienes bitácoras inscritas.</h1>

                @elseif(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante' & \Illuminate\Support\Facades\Auth::user()->disponibilidad == 'No' & auth()->user()->bitacoras->first()->estado != 'Finalizada' )

                    @foreach(auth()->user()->bitacoras as $bita)
                        @if(($bita->estado)=='Activa')
                            <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                                  action="{{route('avances-store')}}"
                                  enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <tbody>

                                <!-- Arreglar forelse para poder obtener la bitacora del usuario logueado -->
                                @forelse(auth()->user()->bitacoras as $bita)
                                    <tr>
                                        <input type="hidden" name="bita_id" value="{{$bita->id}}">
                                    </tr>
                                @empty
                                    <tr>
                                        <th> No hay ningún Alumno asociado a esta Bitacora</th>
                                    </tr>
                                @endforelse
                                </tbody>

                                <div class="text-center">
                                    <span class="display-3">Crear un Avance</span>
                                </div>

                                <hr>

                                <input class="form-control shadow-sm bg-light" name="name" type="hidden"
                                       value="{{auth()->user()->name}}">

                                <div class="form-group">
                                    <label class="custom-select-lg" for="descripcion"> Descripción avance </label>
                                    <input class="form-control shadow-sm bg-light" name="descripcion" type="text">
                                </div>

                                <input class="form-control shadow-sm bg-light" name="name_evid" type="hidden"
                                       value="Indefinido">

                                <div class="form-group">
                                    <label class="custom-select-lg" for="archivo"> Adjuntar Evidencia </label>
                                    <br>
                                    <input accept="image/jpg, image/png, application/pdf, .docx" class="" name="archivo"
                                           type="file">
                                </div>

                                <hr>

                                <div class="py-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill"> Crear
                                    </button>
                                    <a class="btn btn-lg btn-block btn-outline-dark rounded-pill"
                                       href="{{route('home')}}">
                                        Cancelar
                                    </a>
                                </div>
                            </form>

                        @else
                            @if(($bita->causa_renuncia)=='Aprobación del término de trabajo')
                                <div class="mx-auto">
                                    <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/graduation.svg"
                                         alt="finalización de bitacora ucn">
                                </div>

                                <div class="display-3 text-center">
                                    <p>Esta Bitacora ha llegado a su finalización debido a su aprobación.</p>
                                </div>
                            @else
                                <div class="mx-auto">
                                    <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/cancel.svg"
                                         alt="finalización de bitacora ucn">
                                </div>

                                <div class="display-3 text-center">
                                    <p>Esta Bitacora ha finalizado debido a la no continuidad del trabajo. Lo
                                        sentimos. </p>
                                </div>
                            @endif
                        @endif
                    @endforeach

                @elseif(auth()->user()->bitacoras->first()->estado == 'Finalizada')
                    @if( auth()->user()->bitacoras->first()->causa_renuncia == 'No continuidad del trabajo' )
                        <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/cancel.svg"
                             alt="finalización de bitacora ucn">
                        <h1 class="text-center">Esta Bitacora ha finalizado debido a la no continuidad del trabajo. Lo
                            sentimos.</h1>
                    @else
                        <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/graduation.svg"
                             alt="finalización de bitacora ucn">
                        <h1 class="text-center">Esta Bitacora ha llegado a su finalización debido a su aprobación.
                            Muchas feliciades!</h1>
                    @endif

                @else
                    <h1 class="text-center">No tienes bitácoras inscritas.</h1>

                @endif

            </div>
        </div>
    </div>

@endsection

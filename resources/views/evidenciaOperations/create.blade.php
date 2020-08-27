@extends('helpers.template')

@section('title_head', 'Crear Avance')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">
                @if(\Illuminate\Support\Facades\Auth::user()->disponibilidad == 'Si')
                    <h1 class="text-center">No tienes bitácoras inscritas.</h1>
                @elseif(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante' & \Illuminate\Support\Facades\Auth::user()->disponibilidad == 'No'  & auth()->user()->bitacoras->first()->estado != 'Finalizada' )

                    @foreach(auth()->user()->bitacoras as $bita)

                        @if(($bita->estado)=='Activa')

                            <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                                  action="{{ route('evidencia-store') }}"
                                  enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="name_user" value="{{auth()->user()->name}}">

                                <tbody>
                                <!-- Arreglar forelse para poder obtener la bitacora del usuario logueado -->

                                </tbody>

                                <div class="text-center">
                                    <span class="display-3">Crear una Evidencia</span>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="name_evid"> Nombre Evidencia </label>
                                    <input class="form-control shadow-sm bg-light" name="name_evid" type="text">
                                </div>


                                @foreach(auth()->user()->bitacoras as $bita)
                                    <div class="form-group">
                                        <label for="avance_id"> Avances en la Bitacora </label>

                                        <select class="form-control shadow-sm custom-select" name="avance_id">
                                            @foreach($bita->avances as $avance)
                                                <option value="{{$avance->id}}">
                                                    {{$avance->nombre}} ({{$avance->created_at}})
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="archivo"> Adjuntar evidencia </label>
                                    <br>
                                    <input accept="image/jpg, image/png, application/pdf, .docx" class="" name="archivo"
                                           type="file" required>
                                </div>

                                <hr>

                                <div class="py-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill">
                                        Adjuntar Evidencia
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
                        <h1 class="text-center">Esta Bitacora ha finalizado debido a la no continuidad del trabajo. Lo sentimos.</h1>
                    @else
                        <img class="img-fluid my-3" src="{{ URL::to('/')}}/img/graduation.svg"
                             alt="finalización de bitacora ucn">
                        <h1 class="text-center">Esta Bitacora ha llegado a su finalización debido a su aprobación. Muchas feliciades!</h1>
                    @endif

                @endif

            </div>
        </div>
    </div>

@endsection

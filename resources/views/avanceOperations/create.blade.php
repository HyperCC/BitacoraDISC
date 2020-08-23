@extends('helpers.template')

@section('title_head', 'Crear Avance')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante' & \Illuminate\Support\Facades\Auth::user()->disponibilidad == 'No' & auth()->user()->bitacoras->first()->estado != 'Finalizada' )

                    <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                          action="{{route('avances-store')}}" enctype="multipart/form-data">

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

                        <div class="form-group">
                            <input class="form-control shadow-sm bg-light" name="name" type="hidden"
                                   value="{{auth()->user()->name}}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion"> Descripción avance </label>
                            <input class="form-control shadow-sm bg-light" name="descripcion" type="text">
                        </div>

                        <input class="form-control shadow-sm bg-light" name="name_evid" type="hidden"
                               value="Indefinido">

                        <div class="form-group">
                            <label for="archivo"> Archivo </label>
                            <br>
                            <input accept="image/jpg, image/jpg, application/pdf, .docx" class="" name="archivo"
                                   type="file">
                        </div>

                        <hr>

                        <div class="py-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill"> Crear</button>
                            <a class="btn btn-lg btn-block btn-outline-dark rounded-pill" href="{{route('home')}}">
                                Cancelar
                            </a>
                        </div>
                    </form>

                @elseif(\Illuminate\Support\Facades\Auth::user()->disponibilidad == 'Si')
                    <h1 class="text-center">No tienes Bitácoras inscritas.</h1>
                @else
                    <h1 class="text-center">No se pueden registrar Evidencias para esta Bitácora, ya que ha finalizado</h1>
                @endif
            </div>
        </div>
    </div>

@endsection

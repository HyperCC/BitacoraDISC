@extends('helpers.template')

@section('title_head', 'Crear Avance')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                @extends('helpers.validate_errors')

                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Estudiante' and \Illuminate\Support\Facades\Auth::user()->disponibilidad == 'No')

                    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('avances-up') }}"
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

                        <div class="form-group">
                            <label for="name"> Nombre Evidencia </label>
                            <input class="form-control shadow-sm bg-light" name="name" type="text">
                        </div>


                        @foreach(auth()->user()->bitacoras as $bita)
                            <div class="form-group">
                                <label for="avance"> Avances sin Evidencias </label>

                                <select class="form-control shadow-sm custom-select" name="avance">
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
                            <input accept="image/jpg, image/jpeg, application/pdf, .docx" class="" name="archivo"
                                   type="file" required>
                        </div>

                        <hr>

                        <div class="py-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill"> Adjuntar
                                Evidencia
                            </button>
                            <a class="btn btn-lg btn-block btn-outline-dark rounded-pill" href="{{route('home')}}">
                                Cancelar
                            </a>
                        </div>
                    </form>

                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->disponibilidad == 'Si')
                    <h1>No tienes bitácoras inscritas.</h1>
                @endif

            </div>
        </div>
    </div>

@endsection

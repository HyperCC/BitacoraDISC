@extends('helpers.template')

@section('title_head', 'Crear Avance')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('comentario-store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="nombre_profesor" value="{{auth()->user()->name}}">

                    <tbody>
                    <!-- Arreglar forelse para poder obtener la bitacora del usuario logueado -->

                    </tbody>

                    <div class="text-center">

                        <span class="display-3">Crear una Comentario</span>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="nombre"> Nombre Comentario </label>
                        <input class="form-control shadow-sm bg-light" name="nombre" type="text">
                    </div>

                    <div class="form-group">
                        <label for="comentario"> Texto del comentario </label>
                        <textarea type="text" class="form-control shadow-sm bg-light" autocomplete="off"
                                  name="comentario" style="height: 200px"> </textarea>
                    </div>

                    <input type="hidden" name="avance_id" value="{{$avance->id}}">

                    <hr>

                    <div class="py-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill">
                            Crear comentario
                        </button>
                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill" href="{{route('home')}}">
                            Cancelar
                        </a>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection

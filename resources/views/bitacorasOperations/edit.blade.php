@extends('helpers.template')
@section('title_head', 'Editar Bitacora')
@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                @include('helpers.validate_errors')

                <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                      action="{{ route('bitacoras-update', $bitacora) }}">

                    @csrf
                    @method('PATCH')

                    <div class="text-center">
                        <span class="display-3">Editar una Bitacora</span>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="name"> Titulo </label>
                        <input class="form-control shadow-sm bg-light" name="name" type="text"
                               value="{{ old('titulo', $bitacora->titulo) }}">
                    </div>

                    <div class="form-group">
                        <label for="estado"> Estado </label>
                        <select class="form-control shadow-sm custom-select" name="estado">
                            <option @if($bitacora->estado=='Activa') selected @endif>Activa</option>
                            <option @if($bitacora->estado=='Finalizada') selected @endif>Finalizada</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="causa_renuncia"> Causa Renuncia </label>
                        <select class="form-control shadow-sm custom-select" name="causa_renuncia">
                            <option>Ninguna</option>
                            <option @if($bitacora->causa_renuncia=='No continuidad del trabajo') selected @endif>No
                                continuidad del trabajo
                            </option>
                            <option @if($bitacora->causa_renuncia=='Aprobación del termino de trabajo') selected @endif>
                                Aprobación del termino de trabajo
                            </option>
                        </select>
                    </div>
                    <hr>

                    <div class="py-3">
                        <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit"> Guardar</button>
                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill"
                           href="{{ route('bitacoras-index') }}"> Cancelar </a>
                    </div>

                </form>

            </div>
        </div>


    </div>

@endsection

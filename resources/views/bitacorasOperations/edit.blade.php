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
                        <label class="ml-1" for="name"> Titulo </label>
                        <input class="form-control shadow-sm bg-light" name="titulo" type="text"
                               value="{{ old('titulo', $bitacora->titulo) }}">
                    </div>

                    @if($bitacora->estado=="Finalizada")
                        <div class="form-group">
                            <label class="form-check-label m-1">¿Desea reactivar esta Bitacora?</label>
                            <br>
                            <span class="ml-4">
                            <input class="form-check-input" type="checkbox" name="estado"
                                   value="Activa"> Si
                        </span>
                        </div>
                    @else
                        <input type="hidden" value="{{ old('estado', $bitacora->estado) }}" name="estado">
                    @endif

                    <hr>

                    <div class="py-3">
                        <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit">
                            Guardar
                        </button>

                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill"
                           href="{{ route('bitacoras-index') }}"> Cancelar </a>
                    </div>

                </form>

            </div>
        </div>


    </div>

@endsection

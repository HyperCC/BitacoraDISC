@extends('helpers.template')

@section('title_head', 'Bitacora | '.$bitacora->name)

@section('content_body')

    <div class="container" style=".container { background: gray; min-height: 80vh; }">

        <a class="btn btn-outline-secondary mb-4" href="{{ route('bitacoras-index') }}">
            Regresar
        </a>

        <h3> Nombre: {{ $bitacora->titulo }} </h3>


        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('bitacoras-edit', $bitacora) }}"> Editar </a>

                <form method="POST" action="{{ route('bitacoras-remover', $bitacora) }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="estado" value="Removido">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
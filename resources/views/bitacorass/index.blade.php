@extends('helpers.template')

@section('title_head', 'Trabajos')

@section('content_body')

    <div class="container" style=".container { background: gray; min-height: 80vh; }">
        <h1 class="my-3"> Todos los Trabajos registrados</h1>

        <ul class="list-group">
            @forelse($bitacora as $bita)
                @if($bita->estado=='renuncia')
                    <li class="list-group-item border-0 mb-3">
                        <a href="{{ route('bitacoras-show', $bita)}}" class="d-flex text-secondary">
                            <div class="font-weight-bold">
                                <h4>{{$bita->titulo}} / </h4>
                            </div>

                            <div class="font-weight-normal mx-2">
                                <h4>{{$bita->id_estudiante}} / </h4>
                            </div>

                            <div class="text-black-50">
                                <h4>{{$bita->id_profesor}}</h4>
                            </div>
                        </a>
                    </li>
                @endif
            @empty
                <li class="list-group-item border-0 mb-3">
                    Database Empty - Error.
                </li>
            @endforelse

        </ul>
    </div>

@endsection

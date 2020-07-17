@extends('helpers.template')

@section('title_head', 'Trabajos')

@section('content_body')

<div class="container" style=".container { background: gray; min-height: 80vh; }">
    <h1 class="my-3"> Todos los Trabajos registrados</h1>

    <ul class="list-group">
        @forelse($bitacora as $bita)
        @if($bita->estado=='renuncia')
        <li class="list-group-item border-0 mb-3">
            <a href="{{route('bitacoras-show', $bita)}}" class="d-flex text-secondary">
                <div class="font-weight-bold">
                    <h4>{{$bita->titulo}} </h4>
                </div>


                <div class="font-weight-normal">

                    @forelse($user as $us)
                    @if($us-> id == $bita->id_estudiante1)
                    <h4>/{{$us->email}}</h4>
                    @endif
                    @empty

                    @endforelse

                </div>

                <div class="font-weight-normal">

                    @forelse($user as $us)
                    @if($us-> id == $bita->id_estudiante2)
                    <h4>/{$us->email}}</h4>
                    @endif
                    @empty

                    @endforelse

                </div>


                <div class="font-weight-normal">

                    @forelse($user as $us)
                    @if($us-> id == $bita->id_estudiante3)
                    <h4>/{{$us->email}}</h4>
                    @endif
                    @empty

                    @endforelse

                </div>


                <div class="font-weight-normal">

                    @forelse($user as $us)
                    @if($us-> id == $bita->id_estudiante4)
                    <h4>/{{$us->email}}</h4>
                    @endif
                    @empty

                    @endforelse

                </div>

                <div class="font-weight-normal">

                    @forelse($user as $us)
                    @if($us-> id == $bita->id_profesor1)
                    <h4>/{{$us->email}}</h4>
                    @endif
                    @empty

                    @endforelse

                </div>

                <div class="font-weight-normal">

                    @forelse($user as $us)
                    @if($us-> id == $bita->id_profesor2)
                    <h4>/{{$us->email}}</h4>
                    @endif
                    @empty

                    @endforelse

                </div>



            </a>
        </li>
        @endif
        @empty
        <li class="list-group-item border-0 mb-3">
            No hay bitacoras registradas
        </li>
        @endforelse

    </ul>
</div>

@endsection
@extends('helpers.template')

@section('title_head', 'Trabajos')

@section('content_body')

<<<<<<< HEAD
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
=======
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
>>>>>>> 06bf21697b33e27942e3bb4a2ecb3c163bf68254

@endsection

@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container" style=".container { background: gray; min-height: 80vh; }">
        <h1 class="my-3"> Todos los Usuarios registrados</h1>

        <ul class="list-group">
            @forelse($user as $us)
                @if($us->estado=='Activo')
                    <li class="list-group-item border-0 mb-3">
                        <a href="{{route('users-show', $us)}}" class="d-flex text-secondary">
                            <div class="font-weight-bold">
                                <h4>{{$us->name}} / </h4>
                            </div>

                            <div class="font-weight-normal mx-2">
                                <h4>{{$us->email}} / </h4>
                            </div>

                            <div class="text-black-50">
                                <h4>{{$us->rol}}</h4>
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





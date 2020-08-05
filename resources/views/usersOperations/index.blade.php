@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container text-center">

        <p class="display-4 my-4"> Todos los Usuarios activos</p>

        <hr>

        <table class="table table-hover table-responsive-md">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rol</th>
                @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')
                    <th scope="col"> Ver</th>
                @endif
            </tr>
            </thead>

            <tbody>
            @forelse($user as $us)
                @if($us->estado=='Activo')
                    <tr>
                        <td> {{ $us->name }}</td>
                        <td> {{ $us->email }}</td>
                        <td> {{ $us->rol }}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')
                            <td><a href="{{route('users-show', $us)}}" class="btn btn-success px-3"> Ver</a></td>
                        @endif
                    </tr>

                @endif
            @empty
                <tr>
                    <th> No hay ningún Usuario activo</th>
                </tr>
            @endforelse
            </tbody>
        </table>

        <hr>

    </div>


@endsection





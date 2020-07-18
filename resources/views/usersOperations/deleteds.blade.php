@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container">

        <h1 class="display-2 my-3 text-center"> Todos los Usuarios registrados</h1>

        <hr>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rut</th>
                <th scope="col">Carrera</th>
                <th scope="col">Rol</th>
                <th scope="col">Rol Secundario</th>
            </tr>
            </thead>

            <tbody>
            @forelse($user as $us)
                @if($us->estado=='Removido')
                    <tr>
                        <th type="" scope="row">
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->id }} </a>
                        </th>
                        <td>
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->name }} </a>
                        </td>
                        <td>
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->email }} </a>
                        </td>
                        <td>
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->rut }} </a>
                        </td>
                        <td>
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->carrera }} </a>
                        </td>
                        <td>
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->rol }} </a>
                        </td>
                        <td>
                            <a href="{{route('users-show', $us)}}"
                               style="text-decoration:none; color:black;"> {{ $us->rol_secundario }} </a>
                        </td>
                    </tr>

                @endif
            @empty
                <tr>
                    <th> No hay ningún Usuario removido</th>
                </tr>
            @endforelse
            </tbody>
        </table>

        <hr>

    </div>

@endsection





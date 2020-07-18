@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container">

        <h1 class="display-2 my-3 text-center"> Todos los Usuarios registrados</h1>

        <hr>

        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rut</th>
                <th scope="col">Rol</th>
                <th scope="col"> Ver</th>
            </tr>
            </thead>

            <tbody>
            @forelse($user as $us)
                @if($us->estado=='Removido')
                    <tr>
                        <th scope="row"> {{ $us->id }}</th>
                        <td> {{ $us->name }}</td>
                        <td> {{ $us->email }}</td>
                        <td> {{ $us->rut }}</td>
                        <td> {{ $us->rol }}</td>
                        <td><a href="{{route('users-show', $us)}}" class="btn btn-success px-3"> Ver</a></td>
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





@extends('helpers.template')

@section('title_head', 'Trabajos')

@section('content_body')

    <div class="container text-center">

        @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')
            <p class="display-4 my-4"> Todas las Bitacoras registradas </p>
        @else
            <p class="display-4 my-4"> Bitacoras registradas para {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
        @endif

        <br>
        <hr>

        <table class="table table-hover table-responsive-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Estado</th>
                <th scope="col">Total Usuarios</th>
                <th scope="col"> Ver</th>
            </tr>
            </thead>

            <tbody>
            @forelse($bitacoras as $bitacora)

                <tr>
                    <td> {{ $bitacora->titulo }}</td>
                    <td> {{ $bitacora->estado }}</td>
                    <td> nope</td>
                    <td><a href="{{route('bitacoras-show', $bitacora)}}" class="btn btn-success px-3"> Ver</a></td>
                </tr>

            @empty
                <p> No hay Bitacoras registradas </p>
            @endforelse
            </tbody>

        </table>
        <hr>

        <hr>

    </div>

@endsection

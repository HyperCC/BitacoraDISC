@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container text-center">

        <p class="display-4 my-4"> Todas las evidencias para Avance {{ $avance->nombre }}</p>

        <hr>

        <table class="table table-hover table-responsive-md">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre Evidencia</th>
                <th scope="col">Estudiante</th>
                <th scope="col"> Archivo</th>
            </tr>
            </thead>

            <tbody>
            @forelse($avance->evidencias as $evidencia)
                <tr>
                    <td> {{ $evidencia->name_evid }} </td>
                    <td> {{ $evidencia->name_alumno }} </td>
                    <td><a href="#" class="btn btn-success px-3"> Descargar</a></td>
                </tr>
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





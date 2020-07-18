@extends('helpers.template')

@section('title_head', 'Crear Bitacora')

@section('content_body')

<div class="container" style=".container { background: gray; min-height: 80vh; }">

    @extends('helpers.validate_errors')

    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('bitacoras-store') }}">
        @csrf
        <h2>Crear Bitacora</h2>

        <div>
            <label for="titulo"> Nombre Bitacora </label>
            <input class="form-control shadow-sm" name="titulo" type="text">
        </div>

        <div class="form-group">
            <label for="id_estudiante1"> ID estudiante</label>
            <input class="form-control shadow-sm" name="id_estudiante1" type="number" required>
        </div>

<<<<<<< HEAD

=======
>>>>>>> 06bf21697b33e27942e3bb4a2ecb3c163bf68254


        <div>
            <label for="id_estudiante2"> ID estudiante</label>
            <input class="form-control shadow-sm" name="id_estudiante2" type="number" required>
        </div>

<<<<<<< HEAD
</body>
</html>
=======
        <div>
            <label for="id_estudiante3"> ID estudiante</label>
            <input class="form-control shadow-sm" name="id_estudiante3" type="number" required>
        </div>

        <div>
            <label for="id_estudiante4"> ID estudiante</label>
            <input class="form-control shadow-sm" name="id_estudiante4" type="number" required>
        </div>


        <div class="form-group">
            <label for="id_profesor1"> ID profesor</label>
            <input class="form-control shadow-sm" name="id_profesor1" type="number" required>
        </div>

        <div class="form-group">
            <label for="id_profesor2"> ID profesor</label>
            <input class="form-control shadow-sm" name="id_profesor2" type="number" required>
        </div>


        <button type="submit" class="btn btn-primary btn-lg btn-block">Crear</button>
        <a class="btn btn-link btn-block" href="{{route('home')}}">Cancelar</a>


    </form>

</div>

@endsection
>>>>>>> 06bf21697b33e27942e3bb4a2ecb3c163bf68254

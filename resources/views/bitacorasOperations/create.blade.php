@extends('helpers.template')

@section('title_head', 'Crear Bitacora')

@section('content_body')


    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                @extends('helpers.validate_errors')

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('bitacoras-store') }}">

                    @csrf

                    <div class="text-center">
                        <span class="display-3">Crear una Bitacora</span>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="titulo"> Titulo (Campo obligatorio) </label>
                        <input class="form-control shadow-sm bg-light" name="titulo" type="text" required>
                    </div>

                    <div class="form-group">
                        <label for="id_estudiante1">Nombre Estudiante 1 (Campo obligatorio)</label>
                        <select class="form-control" name="id_estudiante1" required>

                            <option>Seleccione</option>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{$estudiante->id}}"> {{$estudiante->name}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_estudiante2">Nombre Estudiante 2</label>
                        <select class="form-control" name="id_estudiante2">

                            <option value="">Seleccione</option>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{$estudiante->id}}"> {{$estudiante->name}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_estudiante3">Nombre Estudiante 3</label>
                        <select class="form-control" name="id_estudiante3">

                            <option value="">Seleccione</option>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{$estudiante->id}}"> {{$estudiante->name}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_estudiante4">Nombre Estudiante 4</label>
                        <select class="form-control" name="id_estudiante4">

                            <option value="">Seleccione</option>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{$estudiante->id}}"> {{$estudiante->name}} </option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="id_profesor1">Nombre Profesor 1 (Campo obligatorio)</label>
                        <select class="form-control" name="id_profesor1" required>

                            <option>Seleccione</option>
                            @foreach($profesores as $profesor)
                                <option value="{{$profesor->id}}"> {{$profesor->name}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_profesor1">Nombre Profesor 2</label>
                        <select class="form-control" name="id_profesor2">

                            <option>Seleccione</option>
                            @foreach($profesores as $profesor)
                                <option value="{{$profesor->id}}"> {{$profesor->name}} </option>
                            @endforeach

                        </select>
                    </div>
                    <hr>

                    <div class="py-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill"> Crear</button>
                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill" href="{{route('home')}}">
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

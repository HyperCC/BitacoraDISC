@extends('helpers.template')

@section('title_head', 'Crear Usuario')

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('users-store') }}">

                    @csrf

                    <div class="text-center">
                        <span class="display-3">Crear un Usuario</span>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="custom-select-lg" for="name"> Nombre </label>
                        <input class="form-control shadow-sm bg-light" name="name" type="text">
                    </div>

                    <div class="form-group">
                        <label class="custom-select-lg" for="email"> Correo </label>
                        <input class="form-control shadow-sm bg-light" name="email" type="email">
                    </div>

                    <div class="form-group">
                        <label class="custom-select-lg" for="carrera"> Carrera </label>
                        <select class="form-control shadow-sm custom-select" name="carrera">
                            <option class="custom-select-lg"> No aplica</option>
                            <option class="custom-select-lg"> ICCI</option>
                            <option class="custom-select-lg"> IenCI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="custom-select-lg" for="name"> Rut </label>
                        <input class="form-control shadow-sm bg-light" name="rut" type="text">
                    </div>

                    <div class="form-group">
                        <label class="custom-select-lg" for="rol"> Rol </label>
                        <select class="form-control shadow-sm custom-select" name="rol">
                            <option class="custom-select-lg">Estudiante</option>
                            <option class="custom-select-lg">Profesor</option>
                            <option class="custom-select-lg">Secretaria</option>
                            <option class="custom-select-lg">Encargado Titulación</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="custom-select-lg" for="password"> Contraseña </label>
                        <input class="form-control shadow-sm bg-light" name="password" type="password">
                    </div>

                    <hr>

                    <div class="py-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill"> Crear</button>
                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill" href="{{route('home')}}">
                            Cancelar </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

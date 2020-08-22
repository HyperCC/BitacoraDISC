@extends('helpers.template')

@section('title_head', 'Editar | '.$user->name)

@section('content_body')

    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-10 col-lg-6 mx-auto my-3">

                <form class="bg-white py-3 px-4 shadow rounded" method="POST"
                      action="{{ route('users-update', $user) }}">

                    @csrf
                    @method('PATCH')

                    <div class="text-center">
                        <span class="display-3">Editar un Usuario</span>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="name"> Nombre </label>
                        <input class="form-control shadow-sm bg-light" name="name" type="text"
                               value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="email"> Correo </label>
                        <input class="form-control shadow-sm bg-light" name="email" type="email"
                               value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="rut"> Rut </label>
                        <input class="form-control shadow-sm bg-light" name="rut" type="text"
                               value="{{ old('rut', $user->rut) }}">
                    </div>

                    <div class="form-group">
                        <label for="carrera"> Carrera </label>
                        <select class="form-control shadow-sm custom-select" name="carrera">
                            <option @if($user->carrera=='No aplica') selected @endif> No aplica</option>
                            <option @if($user->carrera=='ICCI') selected @endif> ICCI</option>
                            <option @if($user->carrera=='IenCI') selected @endif> IenCI</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="rol"> Rol </label>
                        <select class="form-control shadow-sm custom-select" name="rol">
                            <!-- mostrar como seleccionado la opcion guardada en la DB -->
                            <option @if($user->rol=='Estudiante') selected @endif>Estudiante</option>
                            <option @if($user->rol=='Profesor') selected @endif >Profesor</option>
                            <option @if($user->rol=='Secretaria') selected @endif>Secretaria</option>
                            <option @if($user->rol=='Encargado Titulación') selected @endif>Encargado Titulación
                            </option>
                        </select>
                    </div>

                    <!-- por el momento da error de seguridad esta manera de cambiar la clave -->
                    <div class="form-group">
                        <label for="password"> Nueva Contraseña </label>
                        <input class="form-control shadow-sm bg-light" name="password" type="password" value="">
                    </div>

                    <hr>

                    <div class="py-3">
                        <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit"> Guardar</button>
                        <a class="btn btn-lg btn-block btn-outline-dark rounded-pill"
                           href="{{ route('users-index') }}"> Cancelar </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

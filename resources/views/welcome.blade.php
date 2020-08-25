@extends('helpers.template')

@section('title_head', 'Usuario | $user->name')

@section('content_body')

    <div class="container">

        <div class="row">
            <div class="col-12 col-lg-6">

                <h1 class="display-1 text-primary">Bitacora DISC </h1>

                <p class="lead text-secondary pb-3">
                    Bitácora Web para el seguimiento y control de los trabajos de titulación del DISC
                </p>

                @auth
                    <div class="pt-3">
                        <h4 class="text-center ml-4 pb-3"> Hola {{ auth()->user()->email }} </h4>
                        <a href="{{ route('home') }}" class="btn btn-info btn-lg btn-block rounded-pill" type="submit"> ¡Comencemos! </a>
                    </div>

                @else
                    <div class="pt-3">
                        <p for="the_login" class="text-primary text-xl-center font-italic">¡Para continuar debes
                            ingresar con tu cuenta!</p>
                        <div>
                            <a href="{{ route('login') }}"
                               class="btn btn-primary btn-block btn-lg rounded-pill">Login</a>
                        </div>
                    </div>
                @endauth

            </div>

            <div class="col-12 col-lg-6 mt-sm-3">
                <img class="img-fluid py-3" src="img/taking_notes.svg" alt="actividades bitacora ucn">
            </div>

        </div>
    </div>

@endsection




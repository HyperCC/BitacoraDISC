@extends('helpers.template')

@section('title_head', 'Usuario | $user->name')

@section('content_body')

    <div class="container">

        <div class="row py-3">
            <div class="col-12 col-lg-6">

                <h1 class="display-4 text-primary py-3">Bitacora UCN </h1>
                <p class="lead text-secondary pb-3">
                    Bitácora Web para el seguimiento y control de los trabajos de titulación del DISC
                </p>

                @auth
                    <h4 class="pt-3"> Hola {{ auth()->user()->name }} | {{ auth()->user()->email }}</h4>
                @else
                    <div class="pt-3">
                        <p for="the_login" class="text-primary text-xl-center">¡Para continuar debes ingresar con tu cuenta!</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block btn-lg rounded-pill">Login</a>
                    </div>
                @endauth

            </div>
            <div class="col-12 col-lg-6">
                <img class="img-fluid my-4" src="img/bookmarks.svg" alt="actividades bitacora ucn">
            </div>
        </div>
    </div>

@endsection

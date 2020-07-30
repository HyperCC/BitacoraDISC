<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <title>Bitacora DISC - Error 404</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">

</head>
<body>

<div class="d-flex flex-column h-screen justify-content-between" id="app">

    <div class="container">

        <div class="row">
            <div class="col-6 mx-auto">

                <img class="img-fluid m-lg-3 m-sm-3" src="{{ URL::to('/')}}/img/error404.svg"
                     alt="actividades bitacora ucn">

                <div class="display-4 text-center py-3">
                    <p>Esta dirección no existe :( </p>
                </div>

                <div>
                    <a href="{{ \Illuminate\Support\Facades\URL::to('/') }}"
                       class="btn btn-dark text-light rounded-pill btn-lg btn-block">¡Volvamos al inicio!</a>
                </div>
            </div>

        </div>

    </div>
</div>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <title>Bitacora DISC - @yield('title_head')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">

</head>
<body>

<div class="d-flex flex-column h-screen justify-content-between" id="app">

    <header>
        @include('helpers.nav')
    </header>

    <main class="py-3">
        @yield('content_body')
    </main>

    <footer class="bg-dark text-center text-light py-3 shadow" >
        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
    </footer>

</div>

</body>
</html>

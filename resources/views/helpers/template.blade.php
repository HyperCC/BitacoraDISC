<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8"/>
    <title>Bitacora DISC - @yield('title_head')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">

</head>
<body>

<div class="d-flex flex-column h-screen justify-content-between" id="app">

    <header>
        @include('helpers.nav')
    </header>

    
    <div style="margin-top:20px">
        @if(session('info'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            {{ session('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <!-- Mensajes de error -->
        @if(count($errors))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <main class="py-3">
        @yield('content_body')
    </main>

    <footer class="bg-dark text-center text-light py-3 shadow" >
        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
    </footer>

</div>

</body>
</html>

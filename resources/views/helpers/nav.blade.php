<nav class="navbar navbar-light navbar-expand-lg bg-primary shadow-sm">

    <div class="container">

        <!-- ACCESO A PANTALLA PRINCIPAL (HOME) -->
        <a class="navbar-brand font-weight-bold text-light ml-3" href="{{ route('home') }}">
            <img src="{{ URL::to('/')}}/img/logo_bitacora_min_2.svg" width="120" height="40" loading="lazy">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <!-- ACCESO AL HOME -->
                <li class="nav-item mx-1">
                    <a class="nav-link text-light" href="{{ route('home') }}">

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd"
                                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>

                        Home </a>
                </li>

                <!-- ACCESO A BITACORAS  -->
                @auth()
                    <li class="nav-item mx-1">
                        <a class="nav-link text-light" href="{{ route('bitacoras-index') }}">

                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journals" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 2h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2z"/>
                                <path
                                    d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2zM1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            </svg>

                            Bitácoras </a>
                    </li>

                @if(\Illuminate\Support\Facades\Auth::user()->rol=='Admin')

                    <!-- ACCESO A USUARIOS ACTIVOS  -->
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('users-index') }}">

                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg>

                                Usuarios </a>
                        </li>

                        <!-- ACCESO A USUARIOS REMOVIDOS  -->
                        <li class="nav-item mx-1">
                            <a class="nav-link text-light" href="{{ route('users-deleteds') }}">

                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-dash"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                </svg>

                                Usurios Removidos </a>
                        </li>

                    @endif

                <!-- ACCESO A NOTIFICACIONES -->
                    <li class="nav-item dropdown">

                        <div class="btn-group mx-1">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">

                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                                    <path fill-rule="evenodd"
                                          d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                </svg>

                                Notificaciones
                                @if($count = \Illuminate\Support\Facades\Auth::user()->unreadNotifications->count())
                                    <span class="badge bg-danger"> {{ $count }} </span>
                                @endif
                            </a>

                            <div class="dropdown-menu">

                                @forelse(auth()->user()->notifications->slice(0, 5) as $notify)

                                    <a class="dropdown-item" href="{{ route('notificaciones-index') }}"
                                       style="max-width: 300px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">

                                        @if($notify->unread())
                                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                 class="bi bi-app-indicator" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            </svg>
                                        @else
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-app"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M11 2H5a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z"/>
                                            </svg>
                                        @endif

                                        {{ $notify->data }}
                                    </a>
                                    <small class="ml-3"> {{ $notify->created_at->diffForHumans() }} </small>
                                    <div class="dropdown-divider"></div>

                                @empty
                                    <p class="dropdown-item">Sin notificaciones</p>
                                @endforelse

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center" href="{{ route('notificaciones-index') }}">Ver
                                    Todo</a>

                            </div>
                        </div>

                    </li>

                    <!-- ACCESO A AYUDA -->
                    <li>
                        <a class="nav-link text-light" href="#">

                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path
                                    d="M5.25 6.033h1.32c0-.781.458-1.384 1.36-1.384.685 0 1.313.343 1.313 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.007.463h1.307v-.355c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.326 0-2.786.647-2.754 2.533zm1.562 5.516c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                            </svg>

                            Ayuda </a>
                    </li>

                    <!-- ACCESO A LA CUENTA DEL USAURIO -->
                    <li class="nav-item dropdown mx-1">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>

                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                 fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>

                        </div>
                    </li>

                @endauth
            </ul>
        </div>

    </div>

</nav>

@extends('helpers.validate_errors')

@if(session()->has('flash'))
    <div class="alert alert-success custom-select-lg">{{ session('flash') }}</div>
@endif

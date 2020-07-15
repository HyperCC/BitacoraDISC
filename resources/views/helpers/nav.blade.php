<nav class="navbar navbar-light bg-primary shadow-sm">

    <a class="navbar-brand font-weight-bold text-light" href="{{ route('home') }}">
        {{ config('app.name') }}
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('home') }}"> Home </a>
        </li>

        @auth()
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('users-index') }}"> Usuarios </a>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        @endauth
    </ul>

</nav>

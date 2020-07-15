@extends('helpers.template')

@section('title_head', 'Home')

@section('content_body')
    <div class="container" style=".container { background: gray; min-height: 80vh; }">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>

                    @if(\Illuminate\Support\Facades\Auth::user()->rol == 'Admin')
                        <div class="card-body">
                            <a href="{{ route('users-create') }}">Crear Usuario</a>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('users-index') }}">Usuarios Activos</a>
                        </div>

                        <div class="card-body">
                            <a href="#">Usuarios Removidos</a>
                        </div>

                    @endif

                    <div class="card-body">
                        <h4> Hello {{ auth()->user()->email }}</h4>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

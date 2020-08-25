@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container">
        <h1 class="text-center my-3 display-4">Todas las Notificaciones</h1>
        <br>
        <div class="row mt-3">
            <div class="col-md-6 mb-sm-3">
                <h2 class="text-center">No leídas</h2>

                <ul class="list-group">
                    @forelse($unreadNotifications as $unread)
                        <li class="list-group-item"> {{ $unread->data }}</li>
                        <li class="list-inline mb-3 ml-3"> <small> {{ $unread->created_at->diffForHumans() }}</small></li>
                    @empty
                        <li class="list-group-item">No hay Notificaciones sin leer</li>
                    @endforelse
                </ul>
            </div>

            <div class="col-md-6 mb-sm-3">
                <h2 class="text-center">Leídas</h2>

                <ul class="list-group">
                    @forelse($readNotifications as $read)
                        <li class="list-group-item"> {{ $read->data }}</li>
                        <li class="list-inline mb-3 ml-3"> <small> {{ $read->created_at->diffForHumans() }}</small></li>
                    @empty
                        <li class="list-group-item">No hay Notificaciones</li>
                    @endforelse
                </ul>
            </div>

        </div>

    </div>

@endsection

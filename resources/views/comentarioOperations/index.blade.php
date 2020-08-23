@extends('helpers.template')

@section('title_head', 'Usuarios')

@section('content_body')

    <div class="container text-center">

        <p class="display-4 my-4"> Todos los comentarios del Avance {{ $avance->descripcion }}</p>
       

        <hr>

        <table class="table table-hover table-responsive-md">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Profesor</th>
                <th scope="col"> Comentario</th>
            </tr>
            </thead>

            <tbody>
            @forelse($avance->comentarios as $comen)
                <tr>
                    <td>{{$comen->nombre}}</td>
                    <td>{{$comen->nombre_pofesor}}</td>
                    <td>{{$comen->comentario}}</td>
                </tr>
            @empty
                <tr>
                    <th> No hay ningún comentario sobre este avance.</th>
                </tr>
            @endforelse


            </tbody>
        </table>
        

        <hr>
        @if(\Illuminate\Support\Facades\Auth::user()->rol != 'Estudiante')
        <div class="py-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block rounded-pill" style= "width :200px ;margin-left: auto;
        margin-right: auto;"> <a style ="color: white" href="{{route('comentario-create',$avance)}}">Ingresar Comentario</a> </button>
                        
        </div>
        
        @endif
        

    </div>
    
    


@endsection





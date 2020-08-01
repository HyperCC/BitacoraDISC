@extends('helpers.template')

@section('title_head', 'Crear Bitacora')

@section('content_body')


<div class="container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- <script>
        $(".sel").each(function() {
            // Al cargar el documento guardo las opciones originales
            $(this).data('original', $(this).html());
        });
        $(document).on('change', '.sel', function() {
            $('.sel').each(function() {
                // Restauro  todas las opciones para todos los elementos 
                var valor = $(this).val();
                $(this).html($(this).data('original'));
                $(this).val(valor);
            });

            $('.sel').each(function() {
                // borro las opciones  que no están seleccionadas 
                $(this).siblings().find('option[value="' + $(this).val() + '"]').remove();
            });


        });
    </script> -->

    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('bitacora.store') }}">


        @csrf
        <h2>Crear Bitacora</h2>



        <div>
            <label for="titulo">Nombre Bitacora (Campo obligatorio) </label>
            <input class="form-control shadow-sm" name="titulo" type="text" required>
        </div>

        <br>
        <div>
            <label for="est1">Nombre Estudiante 1 (Campo obligatorio)</label>
            <select class="form-control" name="est1" id="" required>
                <option value="">Seleccione</option>

                @foreach($usuarios as $usuario)

                <option value="{{$usuario->id}}"> {{$usuario->name}} </option>

                @endforeach

            </select>



            <br>


            <label for="est2">Nombre Estudiante 2</label>
            <select class="form-control " name="est2" id="">
                <option value="0">Seleccione</option>

                @foreach($usuarios as $usuario)

                <option value="{{$usuario->id}}"> {{$usuario->name}} </option>

                @endforeach

            </select>



            <br>


            <label for="est3">Nombre Estudiante 3</label>
            <select class="form-control " name="est3" id="">
                <option value="0">Seleccione</option>

                @foreach($usuarios as $usuario)

                <option value="{{$usuario->id}}"> {{$usuario->name}} </option>

                @endforeach

            </select>



            <br>


            <label for="est4">Nombre Estudiante 4</label>
            <select class="form-control " name="est4" id="">
                <option value="0">Seleccione</option>

                @foreach($usuarios as $usuario)

                <option value="{{$usuario->id}}"> {{$usuario->name}} </option>

                @endforeach

            </select>

        </div>



        <div>
            <br>

            <label for="id_profesor1">Nombre Profesor 1 (Campo obligatorio)</label>
            <select class="form-control" name="id_profesor1" id="" required>
                <option value="0">Seleccione</option>

                @foreach($profesores as $profesor)

                <option value="{{$profesor->id}}"> {{$profesor->name}} </option>

                @endforeach

            </select>


            <br>

            <label for="id_profesor2">Nombre Profesor 2</label>
            <select class="form-control" name="id_profesor2" id="">
                <option value="0">Seleccione</option>

                @foreach($profesores as $profesor)

                <option value="{{$profesor->id}}"> {{$profesor->name}} </option>

                @endforeach

            </select>
        </div>





        <br>



        <button type="submit" class="btn btn-primary btn-lg btn-block" style="border-radius: 40px;width:200px;margin:0 auto">CREAR</button>
        <a class="btn btn-link btn-block" href="{{route('home')}}">Cancelar</a>



    </form>

</div>



@endsection
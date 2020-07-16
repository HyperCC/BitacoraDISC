<!-- @extends('helpers.template')
@section('content')

<div class="container">
@include('helpers.validate_errors')

            <form class="bg-white py-3 px-4 shadow rounded" method="POST"
               action="{{ route('bitacoras-update', $bitacora) }}">
                 @csrf
                   @method('PATCH')
                     <h2 class="display-4">Editar trabajos</h2>
                       <hr>

                            <div class="form-group">
                          <label for="titulo"> Nombre </label>
                          <input class="form-control shadow-sm" name="name" type="text"
                       value="{{ old('name', $bitacora->name) }}">
                       </div>
     
                            </div>
                         </div>
                      </div>

                    </div>
                  </div>
                 <button class="btn btn-primary btn-lg btn-block" type="submit"> Guardar</button>
                 <a class="btn btn-link btn-block" href="{{ route('users-index') }}"> Cancelar </a>

              </form>
   </div>
@endsection  -->
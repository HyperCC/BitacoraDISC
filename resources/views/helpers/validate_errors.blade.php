@if($errors->any())
    <div class="alert alert-danger">

        <p class="custom-select-lg"> Para continuar debe corregir los siguientes errores:</p>
        <ul>
            @foreach($errors->all() as $error)
                @if($error == 'auth.failed')
                    <li>Error en la autenticación, verificar las credenciales ingresadas.</li>
                @else
                    <li>{{ $error }}</li>
                @endif
            @endforeach
        </ul>

    </div>
@endif

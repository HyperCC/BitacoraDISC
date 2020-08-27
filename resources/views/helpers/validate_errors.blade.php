@if($errors->any())
    <div class="alert alert-danger">

        <p class="custom-select-lg"> Para continuar debe corregir los siguientes errores:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li class="custom-select-lg">{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

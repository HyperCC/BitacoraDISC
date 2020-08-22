@if($errors->any())
    <div class="alert alert-danger">

        <p> Para continuar debe corregir los siguientes errores:</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif

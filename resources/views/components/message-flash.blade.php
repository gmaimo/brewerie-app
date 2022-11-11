@if($message = Session::get('success'))

    <div class="my-5 bg-success text-white p-2 mx-5">
        {{ $message }}
    </div>

@elseif($message = Session::get('error'))

    <div class="my-5 bg-danger text-white p-2 mx-5">
        {{ $message }}
    </div>

@elseif ($errors->has ('name'))
    <div class="my-5 bg-warning text-white p-2 mx-5">
        El campo nombre no cumple las validaciones.
    </div>

@elseif ($errors->all() )
<div class="my-5 bg-primary text-white p-2 mx-5">
{{--     {{ $errors->first() }} --}}

    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

</div>


@endif

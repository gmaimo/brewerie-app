@extends('layout.breweries')

@section('title', 'Sugerencia de cervecería')

@section('content')

<h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">Sugerir una cervecería</h1>

<form method="post" action="{{ route ('suggestbrewery')}}" class="mt-5 formulario mx-auto vh-100">

    @csrf

    <div class="mx-md-5 px-md-5">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mt-2 h4">Email</label>
            <input type="email" class="form-control input-style" id="exampleFormControlInput1" aria-describedby="emailHelp" name="email" placeholder="example@email.com">
            <div id="emailHelp" class="form-text">No será compartido</div>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label mt-2 h4">Cervecería</label>
            <input type="text" class="form-control input-style" id="name" name="name" placeholder="Indica el nombre de la cervecería">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label mt-2 h4">Descripción</label>
            <textarea class="form-control input-style" id="message" name="message" rows="10"  placeholder="Escribe tu mensaje"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-color mx-auto mt-4 px-4">Enviar</button>
        </div>
    </div>
</form>

<x-message-flash />

@endsection

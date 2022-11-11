@extends('layout.breweries')

@section('title', 'Nueva cerveza')

@section('content')

<h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">Editar cerveza</h1>

<form method="post" action="{{ route ('beers.update', $beer) }}" class="mt-5 formulario mx-auto vh-100"> {{-- enctype="text/plain" --}}

    @method("PUT")
    @csrf

    <div class="mx-md-5 px-md-5">
        <div class="mb-3">
            <label for="name" class="form-label h4">Nombre de la cerveza</label>
            <input type="text" class="form-control input-style" id="name" aria-describedby="name" name="name" value="{{ $beer->name }}" placeholder="Nombre comercial de la cervecería">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label mt-2 h4">Descripción</label>
            <textarea class="form-control input-style" id="description" aria-describedby="description" name="description" placeholder="Cuéntanos que la hace especial">{{ $beer->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label mt-2 h4">País de origen</label>
            <input type="text" class="form-control input-style" id="country" aria-describedby="country" name="country" value="{{ $beer->country }}" placeholder="País de origen de la cerveza">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label mt-2 h4">Marca de la cerveza</label>
            <input type="text" class="form-control input-style" id="brand" aria-describedby="brand" name="brand" value="{{ $beer->brand }}" placeholder="Marca de la cerveza">
        </div>
        <div class="mb-3">
            <label for="vol" class="form-label mt-2 h4">Graduación de la cerveza</label>
            <input type="number" class="form-control input-style" id="vol" aria-describedby="vol" name="vol" value="{{ $beer->vol }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-color mx-auto mt-4 px-4">Enviar</button>
        </div>
    </div>
</form>

<x-message-flash />

@endsection

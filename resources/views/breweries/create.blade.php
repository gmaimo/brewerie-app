@extends('layout.breweries')

@section('title', 'Nueva cervecería')

@section('content')

<h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">Añadir cervecería</h1>

<form method="post" enctype="multipart/form-data" action="{{ route ('brewerie')}}" class="mt-5 formulario mx-auto vh-100">

    @csrf

    <div class="mx-md-5 px-md-5">
        <div class="mb-3">
            <label for="name" class="form-label h4">Nombre de la cervecería</label>
            <input type="text" class="form-control input-style" id="name" aria-describedby="name" name="name" value="{{ old('name') }}" placeholder="Nombre comercial de la cervecería">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label mt-2 h4">Descripción</label>
            <textarea class="form-control input-style" id="description" rows="6" aria-describedby="description" name="description" placeholder="Cuéntanos que la hace especial">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label mt-2 h4">Imagen de portada</label>
            <input type="file" class="form-control input-style" id="img" aria-describedby="img" name="img">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label mt-2 h4">Carta de cervezas</label>
            <br>
            @foreach ($beers as $beer)
                <input class="ms-2" type="checkbox" id="beers_{{$beer->id}}" aria-describedby="name" name="beers[]" value="{{$beer->id}}">{{$beer->name}}
            @endforeach
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-color mx-auto mt-4 px-4">Enviar</button>
        </div>
    </div>
</form>

<x-message-flash/>

@endsection

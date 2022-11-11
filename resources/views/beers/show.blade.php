@extends('layout.breweries')

@section('title', 'Detalle de cerveza')

@section('content')

<h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">Detalle cerveza</h1>

<div class="col-12 col-lg-6 col-xl-4 p-4 mx-auto">
    <div class="card card-bg shadow mx-auto" style="width: 60vh">
        <div class="card-body text-center">
            <h3 class="card-title mt-2"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none card-h3 fw-bold">{{$beer->name}}</a></h3>
            <h5 class="card-title mt-4"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">{{$beer->description}}</a></h5>
            <p class="card-title mt-5"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">País de origen: {{$beer->country}}</a></p>
            <p class="card-title"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">Marca: {{$beer->brand}}</a></p>
            <p class="card-title mb-5"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">Volumen de alcohol: {{$beer->vol}}%</a></p>

            <p>Disponible en: <br></p>
            @foreach ($beer->breweries as $brewerie)
                <a href="{{ route ('brewerieshow', $brewerie->id) }}" class="text-decoration-none h4 d-block"><span class="badge beer-badge text-dark">{{ $brewerie->name }}</span></a>
            @endforeach
        </div>
    </div>
</div>

<div class="container d-flex justify-content-center my-5">
    @if (Auth::check())

        <div class="col text-center"><a href="{{ route ('beers.edit', $beer) }}" class="btn btn-warning">Editar</a></div>
        <form method="post" action="{{ route ('beers.destroy', $beer) }}">
            @csrf
            @method('delete')
                <div class="col text-center"><input type="submit" value="Eliminar" class="btn btn-danger"></div>
        </form>
    @else
        <div class="col-sm-12 text-center"><p>Solamente el autor puede modificar la cervecería</p></div>
    @endif
        <div class="col text-center"><a href="{{ route ('beers.index') }}" class="btn btn-success">Volver</a></div>
</div>

@endsection

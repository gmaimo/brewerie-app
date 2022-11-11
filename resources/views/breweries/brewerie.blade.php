@extends('layout.breweries')

@section('content')

<h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">Detalle cervecería</h1>

<div class="container d-flex justify-content-center mt-5 pt-5">
    <div class="mx-auto mb-4 brewery-detail">
        <div>
            <img src="{{ $brewerie->url ?: asset ('/img/defaultbreweryimg.jpg') }}" class="img-fluid" alt="imagen de cervecería" >
        </div>
        <div>
            <h1 class="text-center my-4">{{$brewerie->name}}</h1>
            <h5 class="text-center mb-3">{{$brewerie->description}}</h5>
            <div class="">
                <p class="d-block justify-content-center m-4 text-center">
                @foreach ($brewerie->beers as $beer)
                <a href="{{ route ('breweriebeers', $beer->id) }}" class="h4 m-1 text-decoration-none"><span class="badge bg-dark my-2">{{$beer->name}}</span></a>
                @endforeach
                </p>
            </div>
            <p class="text-center mt-5">Cervecería propuesta por <a class="text-decoration-none" href="{{ route ('proposals', $brewerie->user->id) }}"><span class="badge card-badge">{{ $brewerie->user->name }}</span></a></p>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-center mt-4 mb-5 pb-5">
    @if (Auth::check())
        <div><a href="{{ route ('brewerieedit', $brewerie) }}" class="btn btn-warning">Editar</a></div>
        <form method="post" action="{{ route ('breweriedelete', $brewerie) }}">
            @csrf
            @method('delete')
                <div class="mx-5"><input type="submit" class="btn btn-danger" value="Eliminar"></div>
        </form>
        <div><a href="{{ route ('home') }}" class="btn btn-success">Volver</a></div>
    @else
    <div class="d-flex flex-column">
        <div class="col-sm-12 text-center"><p>Solamente el autor puede modificar la cervecería</p></div>
        <div class="mx-auto"><a href="{{ route ('home') }}" class="btn btn-success">Volver</a></div>
    </div>
    @endif
</div>



@endsection

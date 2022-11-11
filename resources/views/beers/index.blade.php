@extends('layout.breweries')

@section('content')

    <h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">Listado de cervezas</h1>

    <div class="row mx-sm-2 px-sm-2">

        @foreach ($beers as $beer)
        <div class="col-12 col-lg-6 col-xl-4 p-4">
            <div class="card card-size card-bg shadow mx-auto">
                <div class="card-body text-center">
                    <h3 class="card-title mt-2"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none card-h3 fw-bold">{{$beer->name}}</a></h3>
                    <h5 class="card-title mt-4"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">{{$beer->description}}</a></h5>
                    <p class="card-title mt-5"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">País de origen: {{$beer->country}}</a></p>
                    <p class="card-title"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">Marca: {{$beer->brand}}</a></p>
                    <p class="card-title mb-5"><a href="{{ route ('beers.show', $beer->id) }}" class="text-decoration-none text-dark fw-bold">Volumen de alcohol: {{$beer->vol}}%</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div>
        <div class="container d-flex justify-content-center mt-4">
            {{ $beers->links () }}
        </div>
    </div>

    @auth
        <div>
            <div class="container d-flex justify-content-center mt-4 mb-5">
                <a href="{{route ('beers.create')}}" class="btn btn-color px-4">Nueva cerveza</a>
            </div>
        </div>
    @else
        <p class="text-center mt-4 mb-5">Los usuarios registrados pueden crear nuevas cervezas</p>
    @endauth

@endsection

@isset($texto)

@section('message')
    {{-- <x-message texto="{{ $texto }}"/> // <x-message :texto="$texto"/> --}}
    <x-message color="danger">
        <x-slot:texto>{{ $texto }}</x-slot:texto>
    </x-message>
@endsection

@endisset

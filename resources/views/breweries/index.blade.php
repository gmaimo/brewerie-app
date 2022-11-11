@extends('layout.breweries')

@section('title', '')

@section('content')

@include('template.welcome')

@isset($filter)
    <h5 class="text-center">Propuestas por {{ $filter }}</h5>
@endisset

    <div class="row mx-sm-5 px-sm-5">

        @foreach ($breweries as $brewerie)
        <div class="col-12 col-lg-6 col-xl-4 d-flex justify-content-around">
            <div class="card mb-5 card-size">
                <img src="{{ $brewerie->url ?: asset ('/img/defaultbreweryimg.jpg') }}" onclass="card-img-top" onclick="window.location = '{{ route ('brewerieshow' , $brewerie->id)}}'">
                <div class="card-body">
                    <h3 class="card-title"><a href="{{ route ('brewerieshow', $brewerie->id) }}" class="text-decoration-none card-h3">{{$brewerie->name}}</a></h3>
                    <p>Propuesto por <a href="{{ route ('proposals', $brewerie->user->id) }}" class="text-decoration-none"><span class="badge card-badge">{{ $brewerie->user->name }}</span></a></p>
                    <p>
                        @foreach ($brewerie->beers as $beer)
                            <a href="{{ route ('breweriebeers', $beer->id) }}" class="text-decoration-none"><span class="badge bg-dark">{{$beer->name}}</span></a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        {{-- <tr><td><a href="/brewerie/{{$brewerie->id}}">{{$brewerie->name}}</a></td></tr> --}}
        @endforeach
    </div>

    <div>
        <div class="container d-flex justify-content-center my-4">
            {{ $breweries->links () }}
        </div>
    </div>

    @auth
        <div>
            <div class="container d-flex justify-content-center mt-4 mb-5">
                <a href="{{route ('brewerie')}}" class="btn btn-color px-4">Nueva cervecería</a>
            </div>
        </div>
    @else
        <p class="text-center mt-4 mb-5">Los usuarios registrados pueden crear nuevas cervecerías</p>
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

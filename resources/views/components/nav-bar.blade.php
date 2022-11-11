<nav class="navbar navbar-expand-lg bg-dark navbar-dark text-uppercase">
    <div class="container-fluid">
        <a class="text-white nav-link active px-2" aria-current="page" href="{{route ('home') }}">Cervecerías</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route ('beers.index') }}">Cervezas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url ('/contact')}}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url ('/brewery')}}">Sugerir una
                        cervecería</a>
                </li>
                <li>
                    <a href="{{route ('brewerie')}}" class="btn btn-nav ms-3">Nueva cervecería</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url ('/about')}}"">Sobre nosotros</a>
            </li> --}}
        </ul>
        <div>
            <ul class="navbar-nav text-center me-2">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
            </ul>
        </div>
    </div>
    </div>
</nav>

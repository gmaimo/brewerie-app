<x-head/>

<body>

    <!-- Nav Bar -->

    <x-nav-bar/>

    <!-- Titulo -->

    {{-- <h1 class="text-center m-5 p-3 display-4 h1-color fw-bold">@yield ('title')</h1> --}}

    <!-- Contenido -->

    @yield ('content')

    @yield('message')

    <x-footer/>

<script src="{{asset ('js/app.js')}}" rel="text/javascript"></script>
<script src="{{asset ('js/myjs.js')}}" rel="text/javascript"></script>

</body>
</html>

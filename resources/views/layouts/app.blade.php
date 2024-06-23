<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
   
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .select2-container {
       z-index: 99999;
}
        .select2-search__field {
            z-index: 999999;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd-4_Uif3lktwZkYS0EP2-jaq9MgxvX0FcdPSu8AJPGA&s" alt="50" height="50">
                    {{ config('app.name', 'Biblioteca') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrase') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown fw-bold" class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span >
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        </nav>

        <main class="">
            <div class="row bg-light p-0 m-0">
                @guest
                    <div class="col-12">
                        @yield('content')
                    </div>
                    
                @else
                <div class="col-2 border-end p-0 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="min-height: 900px">
                    <div class="list-group rounded-0 ">
                        <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action p-4 p-4" id="administrar dashboard">
                            <span>
                                <h5 class="fw-bold">Dashboard</h5>
                            </span>
                        </a>
                        <a href="{{ route('prestamo.index') }}" class="list-group-item list-group-item-action p-4 p-4" id="administrar prestamo">
                            <span>
                                <h5 class="fw-bold">Prestamos</h5>
                            </span>
                        </a>
                        <a href="{{ route('recurso.index') }}" class="list-group-item list-group-item-action p-4" id="administrar recursos">
                            <span>
                                <h5 class="fw-bold"> Libros y recursos</h5>
                            </span>                     
                        </a> 
                        <a href="{{ route('categoria.index') }}" class="list-group-item list-group-item-action p-4" id="administrar categoria">
                            <span>
                                <h5 class="fw-bold">Categorias</h5>
                            </span>            
                        </a>
                        <a href="{{ route('editorial.index') }}" class="list-group-item list-group-item-action p-4" id="administrar editorial">
                            <span>
                                <h5 class="fw-bold">Editoriales</h5>
                            </span>            
                        </a>
                        <a href="{{ route('author.index') }}" class="list-group-item list-group-item-action p-4" id="administrar author">
                            <span>
                                <h5 class="fw-bold">Autores</h5>
                            </span>
                        </a>
                        <a href="{{ route('usuario.index') }}" class="list-group-item list-group-item-action p-4" id="administrar usuario-menu">
                            <span>
                                <i class="fa-solid fa-user"></i>
                                <h5 class="fw-bold">Usuarios</h5>
                            </span>
                        </a>
                        <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action p-4" id="administrar admin-system">
                            <span>
                                <h5 class="fw-bold">
                                    Administracion de datos
                                </h5>
                            </span>
                        </a>
                        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action p-4" id="administrar admin-permisos">
                            <span>
                                <h5 class="fw-bold">
                                    Permisos de Usuario
                                </h5>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-10 p-4">
                   <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="min-height: 900px">
                    @yield('content')
                   </div>
                </div>
                @endguest
            </div>
        </main>
    </div>

    @stack('scripts')
 
    <script>
        $('.js-example-basic-single').select2();
        function buscarPermisos()
        {
            let url = "/user/permisos";
            fetch(url)
            .then(response => response.json())
            .then(data => {
                let permisos = data;
                let menu = document.querySelectorAll('.list-group-item');
                menu.forEach(element => {
                    let id = element.id;
                    if(permisos.some(x => x.name.includes(id)))
                    {
                        element.style.display = 'block';
                    }else{
                        element.style.display = 'none';
                    }
                });
            });
        }
        document.addEventListener('DOMContentLoaded', buscarPermisos);
    </script>
  
    
</body>
</html>

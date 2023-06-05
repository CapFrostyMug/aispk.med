<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') AISPK | @show</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="bg-secondary bg-opacity-10">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm p-0 custom-navbar-bg-color">
        <div class="container">
            <a class="navbar-brand p-2" href="{{ url('/') }}">
                <img src="/img/aispk-logo.svg" width="50" height="54" alt="aispk-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown custom-navbar-border-right custom-navbar-font">
                            <a class="nav-link dropdown-toggle text-white"
                               data-bs-toggle="dropdown"
                               href="#"
                               role="button"
                               aria-expanded="false">Личные дела
                            </a>
                            <ul class="dropdown-menu"> {{-- navbar-nav me-auto --}}
                                @yield('personal-files.menu')
                            </ul>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item dropdown custom-navbar-border-right custom-navbar-font">
                            <a class="nav-link dropdown-toggle text-white"
                               data-bs-toggle="dropdown"
                               href="#"
                               role="button"
                               aria-expanded="false">Админка
                            </a>
                            <ul class="dropdown-menu"> {{-- navbar-nav me-auto --}}
                                @yield('admin.menu')
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
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
    <div class="wrapper container shadow-sm bg-body rounded-0 px-5 pb-5">
        <div class="fullscreen">
            <main class="fullscreen-body py-4">
                @yield('content')
            </main>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-body">

        </div>
    </footer>
</div>
</body>
</html>

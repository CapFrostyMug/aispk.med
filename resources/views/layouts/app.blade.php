<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'АИС «Приёмная комиссия»') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="bg-secondary bg-opacity-10">
<div id="app" class="custom-st-wrapper">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm custom-st-master-navbar p-1">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/aispk-logo.svg" alt="logo" width="50" height="54">
            </a>
            @if(Auth::check())
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @endif

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if(Auth::check())
                    @include('menu.index')
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{--@if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link custom-st-font-color-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link custom-st-font-color-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-decoration-underline" href="#"
                               role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style="color: #FFCFAA">
                                {{ Auth::user()->name }}&nbsp;{{ Auth::user()->surname }}
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
    <main class="container custom-st-main bg-body p-lg-5">
        @yield('content')
    </main>
    <footer class="bg-secondary bg-opacity-25 py-3">
        <div class="container mt-3">
            <div class="row d-flex justify-content-between border-bottom border-2 pb-2 mb-2">
                <ul class="col-12 col-lg-3 list-unstyled">
                    <li class="fw-bold text-secondary">Тюменский медицинский колледж</li>
                    <li><a href="https://www.goutmk.ru" class="d-inline-block text-muted text-decoration-none p-0">goutmk.ru</a></li>
                </ul>
                <ul class="col-12 col-lg-3 list-unstyled">
                    <li class="fw-bold text-secondary">Приёмная комиссия</li>
                    <li class="text-secondary">8 (3452) 40-30-00</li>
                </ul>
                <ul class="col-12 col-lg-3 list-unstyled">
                    <li class="fw-bold text-secondary">Директор</li>
                    <li class="text-secondary">8 (3452) 40-64-50</li>
                </ul>
                <ul class="col-12 col-lg-3 list-unstyled">
                    <li class="fw-bold text-secondary">Почта</li>
                    <li class="text-secondary">pk@goutmk.ru</li>
                    <li class="text-secondary">gapou-mk-tmn@med-to.ru</li>
                </ul>
            </div>
            <p class="text-center text-secondary m-0">&copy; 2022-@php echo date("Y"); @endphp</p>
        </div>
    </footer>
</div>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'АИС «Приёмная комиссия»') }} | Войти</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <style>
        .custom-st-border-radius {
            border-radius: 15px;
        }

        .custom-st-background-color {
            background-color: #41A49E;
        }

        .custom-st-letter-spacing {
            letter-spacing: 0.02em;
        }
    </style>
</head>
<body class="row justify-content-center align-items-center bg-secondary bg-opacity-10">
<div id="app">
    <main class="container">
        <div class="row mb-5">
            <div class="col-4 m-auto">
                <div class="card text-center border border-white border-5 shadow-lg custom-st-border-radius custom-st-background-color p-3">
                    <img src="/img/aispk-logo.svg" class="card-img-top my-4" alt="logo" width="168px" height="179px">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title text-white fw-bold custom-st-letter-spacing m-0">АИС</h4>
                            <h4 class="card-title text-white fw-bold custom-st-letter-spacing m-0">"Приёмная комиссия"</h4>
                        </div>
                        <form action="{{ route('login') }}" method="POST" class="mt-3">
                            @csrf
                            <label for="email" class="col-md-4 col-form-label text-md-end"></label>
                            <input id="email"
                                   class="form-control shadow bg-body rounded py-2 @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   type="email"
                                   required
                                   autofocus
                                   placeholder="Имя пользователя">

                            <label for="password" class="col-md-4 col-form-label text-md-end"></label>
                            <input id="password"
                                   class="form-control shadow bg-body rounded py-2 @error('password') is-invalid @enderror"
                                   name="password"
                                   type="password"
                                   required
                                   placeholder="Пароль">

                            @error('password')
                            <span class="invalid-feedback fs-6 bg-danger text-white rounded-1 mt-3 p-1" role="alert">{{ $message }}</span>
                            @enderror
                            @error('email')
                            <span class="invalid-feedback fs-6 bg-danger text-white rounded-1 mt-3 p-1" role="alert">{{ $message }}</span>
                            @enderror

                            <div class="text-center mt-5">
                                <button class="btn btn-light shadow bg-body rounded px-4">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>

@extends('layouts.app')

@section('title', '')

@section('content')

    <h2 class="fw-bold py-5">*Профиль пользователя*</h2>

    <form class="row col-7 bg-secondary bg-opacity-10 rounded mb-5 gy-3 p-3">
        <div class="col">
            <label for="lastName-1" class="form-label">Фамилия*</label>
            <input id="lastName-1"
                   class="form-control custom-fn-capslock @error('surname') is-invalid @enderror"
                   name="surname"
                   value="{{ old('surname') ?? $student->surname ?? '' }}"
                   type="text"
                   required
                   aria-describedby="lastName-1-validation">
            @error('surname')
            <div id="lastName-1-validation" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col">
            <label for="firstName-1" class="form-label">Имя*</label>
            <input id="firstName-1"
                   class="form-control custom-fn-capslock @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name') ?? $student->name ?? '' }}"
                   type="text"
                   required
                   aria-describedby="firstName-1-validation">
            @error('name')
            <div id="firstName-1-validation" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="email-1" class="form-label">Электронная почта*</label>
            <input
                id="email-1"
                class="form-control custom-fn-capslock @error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') ?? $student->email ?? '' }}"
                type="email"
                placeholder="example@mail.com"
                aria-describedby="email-1-validation">
            @error('email')
            <div id="email-1-validation" class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col">
            <p>Администратор?</p>
            <div class="form-check form-check-inline">
                <input id="genderMale-1" class="form-check-input custom-st-fix-circle" name="gender" value="male" type="radio"
                       checked>
                <label for="genderMale-1" class="form-check-label">Да</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="genderFemale-1"
                       class="form-check-input custom-st-fix-circle"
                       name="gender"
                       value="female"
                       type="radio"
                       @if (old('gender') === 'female' || (isset($passport) && ($passport->gender) === 'female')) checked @endif>
                <label for="genderFemale-1" class="form-check-label">Нет</label>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col">
            <label for="inputPassword2" class="form-label">Пароль*</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="">
        </div>
        <div class="col">
            <label for="inputPassword2" class="form-label">Подтверждение пароля*</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="">
        </div>
        <div class="w-100"></div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success px-4">Сохранить</button>
        </div>
    </form>
@endsection

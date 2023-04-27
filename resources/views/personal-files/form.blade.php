@extends('layouts.app')

@section('title')
    @parent Форма
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="py-5">
        <h2><strong>Форма создания/редактирования/просмотра анкеты</strong></h2>
    </div>

    <form method="POST" action="{{ route('personal-file.create') }}">
        @csrf
        <fieldset>
            <legend><h5><strong>Паспортные данные</strong></h5></legend>
            <div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 1 --}}
                <div class="col-4">
                    <label for="lastName-1" class="form-label">Фамилия</label>
                    <input id="lastName-1" class="form-control" name="lastName" value="{{ old('lastName') }}"
                           type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
                <div class="col-4">
                    <label for="firstName-1" class="form-label">Имя</label>
                    <input id="firstName-1" class="form-control" name="firstName" value="{{ old('firstName') }}"
                           type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
                <div class="col-4">
                    <label for="patronymic-1" class="form-label">Отчество</label>
                    <input id="patronymic-1" class="form-control" name="patronymic" value="{{ old('patronymic') }}"
                           type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
                <div class="col-4">
                    <p>Пол</p>
                    <div class="form-check form-check-inline">
                        <input id="genderMale-1" class="form-check-input" name="gender" value="male" type="radio"
                               checked>
                        <label for="genderMale-1" class="form-check-label">Мужской</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="genderFemale-1" class="form-check-input" name="gender" value="female" type="radio"
                               @if (old('gender') == 'female') checked @endif>
                        <label for="genderFemale-1" class="form-check-label">Женский</label>
                    </div>
                </div>
                <div class="col-2">
                    <label for="birthday-1" class="form-label">Дата рождения</label>
                    <input id="birthday-1" class="form-control" name="birthday" value="{{ old('birthday') }}"
                           type="date" required>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите дату.
                    </div>
                </div>
                <div class="col-4 offset-2">
                    <label for="nationality-1" class="form-label">Гражданство</label>
                    <select id="nationality-1" class="form-select" name="nationality" required>
                        {{--TODO Организовать вывод категорий из Коллекции--}}
                        <option value="">Выберите...</option>
                        <option>Россия</option>
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите вариант.
                    </div>
                </div>
                <div class="col-12">
                    <label for="birthplace-1" class="form-label">Место рождения</label>
                    <input id="birthplace-1" class="form-control" name="birthplace" value="{{ old('birthplace') }}"
                           type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
            </div>

            <div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 2 --}}
                <div class="col-3">
                    <label for="passport-series-1" class="form-label">Серия паспорта</label>
                    <input id="passport-series-1" class="form-control" name="passport-series"
                           value="{{ old('passport-series') }}" type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
                <div class="col-3 offset-1">
                    <label for="passport-number-1" class="form-label">Номер паспорта</label>
                    <input id="passport-number-1" class="form-control" name="passport-number"
                           value="{{ old('passport-number') }}" type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
                <div class="col-2 offset-1">
                    <label for="issue-date-1" class="form-label">Дата выдачи</label>
                    <input id="issue-date-1" class="form-control" name="issue-date" value="{{ old('issue-date') }}"
                           type="date" required>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите дату.
                    </div>
                </div>
                <div class="col-12">
                    <label for="issue-by-1" class="form-label">Паспорт выдан</label>
                    <input id="issue-by-1" class="form-control" name="issue-by" value="{{ old('issue-by') }}"
                           type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
            </div>

            <div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 3 --}}
                <div class="col-12">
                    <label for="address-registered-1" class="form-label">Адрес по прописке</label>
                    <input id="address-registered-1" class="form-control" name="address-registered"
                           value="{{ old('address-registered') }}" type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
                <div class="col-12">
                    <label for="address-residential-1" class="form-label">Адрес проживания</label>
                    <input id="address-residential-1" class="form-control" name="address-residential"
                           value="{{ old('address-residential') }}" type="text" required>
                    <div class="invalid-feedback">
                        Пожалуйста, заполните поле.
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>

    </form>
@endsection

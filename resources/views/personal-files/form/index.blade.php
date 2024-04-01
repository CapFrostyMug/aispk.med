@extends('layouts.app')

@section('title')
    @if(request()->routeIs('personal-files.create'))
        Создание личного дела
    @elseif(request()->routeIs('personal-files.manage.personal-file.show'))
        Просмотр личного дела
    @else
        Редактирование личного дела
    @endif
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold pt-4 pb-5">
            @if(request()->routeIs('personal-files.create'))
                Создание личного дела
            @elseif(request()->routeIs('personal-files.manage.personal-file.show'))
                Просмотр личного дела
            @else
                Редактирование личного дела
            @endif
        </h2>
        @if(!request()->routeIs('personal-files.create'))
            <div class="btn-group" role="group" aria-label="#">
                @include('buttons.button-group-2')
            </div>
        @endif
    </div>

    <div class="d-none">
        @include('personal-files.form.blocks.faculty-block')
    </div>

    @if(!empty($errors->all()))
        <div class="col-12 alert alert-danger">
                <span>
                    Какие-то из&nbsp;обязательных полей <strong>не&nbsp;заполнены</strong> или заполнены <strong>некорректно</strong>.
                    Пожалуйста, проверьте поля, отмеченные <strong>красным цветом</strong>.
                </span>
        </div>
    @endif

    @include('session-message')

    <form
        action="{{ isset($student->id) ? route('personal-files.manage.personal-file.update', $student->id) : route('personal-files.store') }}"
        method="post"
        class="custom-fn-form">
        @csrf
        @if(request()->routeIs('personal-files.manage.personal-file.update'))
            @method('put')
        @elseif(request()->routeIs('personal-files.manage.personal-file.destroy'))
            @method('delete')
        @endif

        @include('personal-files.form.blocks.index')

        @if(!request()->routeIs('personal-files.manage.personal-file.show'))
            <div class="d-flex justify-content-center">
                <button class="btn btn-success custom-st-form-button-size me-4" type="submit">
                    {{ isset($student->id) ? __('Обновить') : __('Сохранить') }}
                </button>

                @if(request()->routeIs('personal-files.create'))
                    <button class="btn btn-secondary custom-st-form-button-size custom-fn-reset-form" type="button">
                        Очистить форму
                    </button>
                @endif
            </div>
        @endif
    </form>
@endsection

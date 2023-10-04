@extends('layouts.app')

@section('title')
    @if(request()->routeIs('personal-file.create'))
        Создание личного дела
    @elseif(request()->routeIs('personal-file.manage.show'))
        Просмотр личного дела
    @else
        Редактирование личного дела
    @endif
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold py-5">
            @if(request()->routeIs('personal-file.create'))
                Создание личного дела
            @elseif(request()->routeIs('personal-file.manage.show'))
                Просмотр личного дела
            @else
                Редактирование личного дела
            @endif
        </h2>
        @if(!request()->routeIs('personal-file.create'))
            <div class="btn-group" role="group" aria-label="#">
                {{--<a href="{{ url()->previous() }}" class="#"></a>--}}
                @if(request()->routeIs('personal-file.manage.show'))
                    <a class="btn btn-outline-secondary"
                       href="{{ route('personal-file.manage.edit', $student->id) }}"
                       role="button">Редактировать @include('icons.personal-files.manage-buttons.edit')
                    </a>
                @endif
                <button class="btn btn-outline-secondary dropdown-toggle rounded-end-0 text-decoration-none"
                        type="button"
                        id="dropdownMenuPrintWord"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        title="Печать">Печать @include('icons.personal-files.manage-buttons.print')
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrintWord">
                    <li>
                        <a href="{{ route('personal-file.manage.export-application', $student->id) }}"
                           class="text-decoration-none dropdown-item">Печать заявления
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('personal-file.manage.export', $student->id) }}"
                           class="text-decoration-none dropdown-item disabled">Печать личного дела
                        </a>
                    </li>
                </ul>
                <button type="button"
                        class="btn btn-danger custom-fn-personal-file-remove"
                        data-student-id="{{ $student->id }}">Удалить @include('icons.personal-files.manage-buttons.remove')
                </button>
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
        action="{{ isset($student->id) ? route('personal-file.manage.update', $student->id) : route('personal-file.store') }}"
        method="post"
        class="custom-fn-form">
        @csrf
        @if(request()->routeIs('personal-file.manage.update'))
            @method('put')
        @elseif(request()->routeIs('personal-file.manage.destroy'))
            @method('delete')
        @endif

        @include('personal-files.form.blocks.index')

        @if(!request()->routeIs('personal-file.manage.show'))
            <div class="d-flex justify-content-center">
                <button class="btn btn-success custom-st-form-button-size me-5" type="submit">
                    {{ isset($student->id) ? __('Обновить') : __('Сохранить') }}
                </button>

                @if(request()->routeIs('personal-file.create'))
                    <button class="btn btn-secondary custom-st-form-button-size custom-fn-reset-form" type="button">
                        Очистить форму
                    </button>
                @endif
            </div>
        @endif
    </form>
@endsection

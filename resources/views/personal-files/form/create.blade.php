@extends('layouts.app')

@section('title')
    @parent @if (request()->routeIs('personal-file.create'))
                Создание личного дела
            @elseif (request()->routeIs('personal-file.management.show'))
                Просмотр личного дела
            @else
                Редактирование личного дела
            @endif
@endsection

@include('menu')

@section('content')
    <div class="col-12">
        <div class="py-5 d-flex justify-content-between align-items-center">
            <h2>
                <strong>
                    @if (request()->routeIs('personal-file.create'))
                        Создание личного дела
                    @elseif (request()->routeIs('personal-file.management.show'))
                        Просмотр личного дела
                    @else
                        Редактирование личного дела
                    @endif
                </strong>
            </h2>
            @if (!request()->routeIs('personal-file.create')) @include('personal-files.form.buttonGroupManageForm') @endif
        </div>

        <div class="d-none">
            @include('personal-files.form.form-blocks.facultyBlock')
        </div>

        @if(!empty($errors->all()))
            <div class="col-12 alert alert-danger">
            <span>
                Какие-то из&nbsp;обязательных полей <strong>не&nbsp;заполнены</strong> или заполнены <strong>некорректно</strong>.
                Пожалуйста, проверьте поля, отмеченные <strong>красным цветом</strong>.
            </span>
            </div>
        @endif

        @include('sessionAlert')

        <form method="POST" action="@if(isset($student->id))
                                        {{ route('personal-file.management.update', $student->id) }}
                                    @else
                                        {{ route('personal-file.store') }}
                                    @endif">

            @if(request()->routeIs('personal-file.management.update')) @method('PUT')
            @elseif (request()->routeIs('personal-file.management.destroy')) @method('DELETE')
            @endif

            @include('personal-files.form.form-blocks.index')

            @if(!request()->routeIs('personal-file.management.show'))
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success me-5 custom-form-button-size"
                                type="submit">
                                @if(isset($student->id))
                                    {{__('Обновить')}}
                                @else
                                    {{__('Сохранить')}}
                                @endif
                        </button>

                        @if(isset($student->id))
                            <a href="{{ route('personal-file.management.search') }}"
                               role="button"
                               class="btn btn-secondary custom-form-button-size">Отмена
                            </a>
                        @else
                            <button class="btn btn-secondary custom-form-button-size"
                                    type="reset">Очистить форму
                            </button>
                        @endif
                    </div>
            @endif
        </form>
    </div>
@endsection

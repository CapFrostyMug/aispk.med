@extends('layouts.app')

@section('title')
    @parent @if(isset($student->id)) Редактирование личного дела @else Создать личное дело @endif
@endsection

@include('menu')

@section('content')
    <div class="py-5">
        <h2>
            <strong>
                @if(isset($student->id))
                    Редактирование личного дела
                @else
                    Форма создания личного дела
                @endif
            </strong>
        </h2>
    </div>

    <div class="d-none">
        @include('personal-files.form.form-blocks.facultyBlock')
    </div>

    @if(!empty($errors->all()))
        <div class="alert alert-danger">
            <span>
                Какие-то из&nbsp;обязательных полей <strong>не&nbsp;заполнены</strong> или заполнены <strong>некорректно</strong>.
                Пожалуйста, проверьте поля, отмеченные <strong>красным цветом</strong>.
            </span>
        </div>
    @endif

    <form method="POST" action="@if(isset($student->id))
                                    {{ route('personal-file.update-file', $student->id) }}
                                @else
                                    {{ route('personal-file.store') }}
                                @endif">

        @if(isset($student->id)) @method('PUT') @endif

        @include('personal-files.form.form-blocks.index')

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
                <a href="{{ route('personal-file.edit-search') }}"
                   role="button"
                   class="btn btn-secondary custom-form-button-size">Отмена
                </a>
            @else
                <button class="btn btn-secondary custom-form-button-size"
                        type="reset">Очистить форму
                </button>
            @endif
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('title')
    @parent Редактирование личного дела
@endsection

@include('menu')

@section('content')
    <div class="py-5">
        <h2><strong>Редактирование личного дела</strong></h2>
    </div>

    <div class="d-none">
        @include('personal-files.form.form-blocks.facultyBlock')
    </div>

    <form method="POST" action="{{ route('personal-file.update-file', $student->id) }}">
        @include('personal-files.form.form-blocks.index')
        <div class="d-flex justify-content-center">
            <button class="btn btn-success me-5 custom-form-button-size" type="submit">Обновить</button>
            <a href="{{ route('personal-file.edit-search') }}" role="button"
               class="btn btn-secondary custom-form-button-size">Отмена</a>
        </div>
    </form>
@endsection

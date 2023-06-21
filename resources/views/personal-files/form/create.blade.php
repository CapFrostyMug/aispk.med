@extends('layouts.app')

@section('title')
    @parent Создать личное дело
@endsection

@include('menu')

@section('content')
    <div class="py-5">
        <h2><strong>Форма создания личного дела</strong></h2>
    </div>

    <div class="d-none">
        @include('personal-files.form.form-blocks.facultyBlock')
    </div>

    <form method="POST" action="{{ route('personal-file.store') }}">
        @include('personal-files.form.form-blocks.index')
        <div class="d-flex justify-content-center">
            <button class="btn btn-success me-5 custom-form-button-size" type="submit">Сохранить</button>
            <button class="btn btn-secondary custom-form-button-size" type="reset">Очистить форму</button>
        </div>
    </form>
@endsection

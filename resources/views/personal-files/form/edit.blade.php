@extends('layouts.app')

@section('title')
    @parent Редактировать личное дело
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

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
            <a href="{{ route('personal-file.edit-search') }}"
               class="btn btn-secondary custom-form-button-size"
               role="button">Отмена
            </a>
        </div>
    </form>
@endsection

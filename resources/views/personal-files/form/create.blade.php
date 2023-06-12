@extends('layouts.app')

@section('title')
    @parent Создать личное дело
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="py-5">
        <h2><strong>Форма создания личного дела</strong></h2>
    </div>

    <div class="d-none">
        @include('personal-files.form.form-blocks.facultyBlock')
    </div>

    <form method="POST" action="{{ route('personal-file.store') }}">
        @include('personal-files.form.form-blocks.index')
        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-success" type="submit">Сохранить</button>
        </div>
    </form>
@endsection

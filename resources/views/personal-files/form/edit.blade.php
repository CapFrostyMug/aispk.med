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
    <form method="POST" action="{{ route('personal-file.edit-file', ['id' => $student->id]) }}">
        @include('personal-files.form.form-blocks.index')
        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>
    </form>
@endsection

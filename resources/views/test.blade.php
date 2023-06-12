@extends('layouts.app')

@section('title')
    @parent Тестовая страница
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="py-5">
        <h2><strong>Тестовая форма</strong></h2>
    </div>

    <form method="POST" action="{{ route('test-store') }}" id="my-form">
        @csrf
        <label for="passport-number-1" class="form-label">Серия и номер паспорта*</label>
        <input id="passport-number-1" class="form-control" name="passportNumber"
               value="{{ old('passportNumber') }}" type="text" required>
        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-success" type="submit">Сохранить</button>
        </div>
    </form>
@endsection

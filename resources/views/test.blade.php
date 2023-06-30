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
        <h2><strong></strong></h2>
    </div>

    <form method="POST" action="" id="my-form">
        @csrf
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Радио по умолчанию
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Радио выбранное по умолчанию
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Радио по умолчанию
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Радио выбранное по умолчанию
            </label>
        </div>
        <button type="submit" class="btn btn-warning">Warning</button>
    </form>
@endsection

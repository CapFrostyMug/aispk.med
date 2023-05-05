@extends('layouts.app')

@section('title')
    @parent {{ $pageTitle }}
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="py-5">
        <h2><strong>Форма создания/редактирования/просмотра анкеты</strong></h2>
    </div>

    <form method="POST" action="{{ route('personal-file.create') }}">
        @csrf
        <fieldset>
            <legend><h5><strong>Паспортные данные</strong></h5></legend>
            @include('personal-files.form-blocks.passportsData')
        </fieldset>

        <fieldset>
            <legend><h5><strong>Контактная информация</strong></h5></legend>
            @include('personal-files.form-blocks.contactsInfo')
        </fieldset>

        <fieldset>
            <legend><h5><strong>Информация для поступления</strong></h5></legend>
            {{--@include()--}}
        </fieldset>

        <fieldset>
            <legend><h5><strong>Сведения об образовании</strong></h5></legend>
            @include('personal-files.form-blocks.educationInfo')
        </fieldset>

        <fieldset>
            <legend><h5><strong>Сведения о трудовом стаже</strong></h5></legend>
            {{--@include()--}}
        </fieldset>

        <fieldset>
            <legend><h5><strong>Дополнительная информация</strong></h5></legend>
            @include('personal-files.form-blocks.otherInfo')
        </fieldset>

        <fieldset>
            <legend><h5><strong>Информация о родственниках</strong></h5></legend>
            {{--@include()--}}
        </fieldset>

        <fieldset>
            <legend><h5><strong>Информация о зачислении</strong></h5></legend>
            {{--@include()--}}
        </fieldset>

        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>

    </form>
@endsection

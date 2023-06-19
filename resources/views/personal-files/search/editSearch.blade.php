@extends('layouts.app')

@section('title')
    @parent Поиск анкеты
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="py-5">
        <h2><strong>Поиск анкеты</strong></h2>
    </div>
    <p class="fs-5 mb-4">Введите серию и номер паспорта без пробелов</p>
    <form class="d-flex" method="POST" action="{{ route('personal-file.edit-find') }}">
        @csrf
        @include('personal-files.search.search-blocks.searchline')
        <div>
            <button
                class="btn btn-success px-5"
                type="submit">Поиск
            </button>
        </div>
    </form>
    @include('personal-files.search.search-blocks.resultsTable')
@endsection

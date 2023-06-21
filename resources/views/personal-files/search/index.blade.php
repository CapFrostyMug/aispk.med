@extends('layouts.app')

@section('title')
    @parent Поиск анкеты
@endsection

@include('menu')

@section('content')
    <div class="row">
        <div class="col-12 py-5">
            <h2><strong>Поиск анкеты</strong></h2>
        </div>
        <p class="fs-5 mb-4">Введите серию и номер паспорта без пробелов</p>
        <form action="{{ route('personal-file.edit-find') }}" method="POST">
            @csrf
            <div class="d-flex">
                <div class="col-3 me-4">
                    <input
                        class="form-control"
                        aria-label="Поиск"
                        name="search"
                        value=""
                        type="search"
                        required
                        placeholder="Поиск">
                </div>
                <div class="col-2 ms-2">
                    <button
                        class="btn btn-success px-5"
                        type="submit">Поиск
                    </button>
                </div>
            </div>
        </form>
        <div class="#">
            @include('personal-files.search.resultsTable')
        </div>
    </div>
@endsection

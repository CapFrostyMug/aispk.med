@extends('layouts.app')

@section('title', 'Поиск анкеты')

@section('content')
    <h2 class="fw-bold pt-4 pb-5">Поиск анкеты</h2>
    @include('session-message')
    <p class="fs-5 mb-4">Введите серию и номер паспорта <strong>без пробелов</strong></p>
    <form action="{{ route('personal-files.manage.personal-file.search') }}" method="get">
        <div class="d-flex">
            <div class="col-3 me-4">
                <input
                    class="form-control"
                    name="passport-number"
                    value=""
                    type="search"
                    required
                    placeholder="Т-АТZ0825000">
            </div>
            <button type="submit" class="btn btn-success col-1">Поиск</button>
        </div>
        @if(isset($student))
            @if(empty($student))
                <p class="fs-5 text-danger pt-5">Ничего не найдено</p>
            @else
                <table class="table table-bordered table-striped mt-5">
                    <thead>
                    <tr class="custom-results-table-bg-color">
                        <th scope="col" class="col-1 text-center">№</th>
                        <th scope="col" class="col-3 text-center">Фамилия</th>
                        <th scope="col" class="col-3 text-center">Имя</th>
                        <th scope="col" class="col-3 text-center">Отчество</th>
                        <th scope="col" class="col-2 text-center">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="text-center">{{ $student->id }}</th>
                        <td class="text-center">{{ $student->surname }}</td>
                        <td class="text-center">{{ $student->name }}</td>
                        <td class="text-center">{{ $student->patronymic }}</td>
                        <td class="text-center">@include('buttons.button-group-1')</td>
                    </tr>
                    </tbody>
                </table>
            @endif
        @endif
    </form>
@endsection

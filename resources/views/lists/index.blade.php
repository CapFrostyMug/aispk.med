@extends('layouts.app')

@section('title', 'Просмотр и печать списков абитуриентов')

@section('content')
    <div class="custom-st-fullscreen-block">
        <div class="block1">
            <div class="#">
                <h2 class="fw-bold py-5">Просмотр и печать списков абитуриентов</h2>
            </div>

            @include('session-message')

            <form action="{{ route('students-lists.view-and-print.filtered-list') }}" method="get" class="custom-fn-form">
                @csrf
                @include('lists.search-filter')
            </form>

            @if(isset($students) && $students->isNotEmpty())
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
                    @foreach($students as $student)
                        <tr>
                            <th scope="row" class="text-center">{{ $student->id }}</th>
                            <td class="text-center">{{ $student->surname }}</td>
                            <td class="text-center">{{ $student->name }}</td>
                            <td class="text-center">{{ $student->patronymic }}</td>
                            <td class="text-center d-flex justify-content-around align-items-center">@include('manage-buttons')</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @elseif (isset($students) && $students->isEmpty())
                <p class="fs-5 text-danger mt-5">По выбранной специальности личные дела не найдены.</p>
            @endif
        </div>
        @if(isset($students) && $students->isNotEmpty())
            <div class="block2">
                {{ $students->links() }}
            </div>
        @endif
    </div>
@endsection

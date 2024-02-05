@extends('layouts.app')

@section('title', 'Просмотр и печать списков абитуриентов')

@section('content')
    <div class="custom-st-fullscreen-block">
        <div class="block1">
            <div class="#">
                <h2 class="fw-bold py-5">Просмотр и печать списков абитуриентов</h2>
            </div>

            @include('session-message')

            <form action="{{ route('students-lists.view-and-print.filter') }}" method="get" class="custom-fn-form">
                @csrf
                @include('lists.search-filter')
            </form>

            <div class="col-12 d-flex justify-content-center my-4">
                {{--@if(!empty($request))--}}
                <span>Найдено записей: {{ $students->total() }}</span>
                {{--@endif--}}
            </div>

            {{--@if(isset($students) && $students->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr class="custom-results-table-bg-color">
                            <th scope="col" class="text-center">№</th>
                            <th scope="col" class="text-center">Фамилия</th>
                            <th scope="col" class="text-center">Имя</th>
                            <th scope="col" class="text-center">Отчество</th>
                            <th scope="col" class="text-center">Специальность</th>
                            <th scope="col" class="text-center">Финансирование</th>
                            <th scope="col" class="text-center">Зачислен</th>
                            <th scope="col" class="text-center">Оригиналы</th>
                            <th scope="col" class="text-center">Ср.&nbsp;балл</th>
                            <th scope="col" class="text-center">Тест</th>
                            <th scope="col" class="text-center">Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <th scope="row" class="text-center">{{ $student->id }}</th>
                                <td class="text-center">{{ $student->surname }}</td>
                                <td class="text-center">{{ $student->name }}</td>
                                <td class="text-center">{{ $student->patronymic }}</td>
                                <td class="text-center text-truncate">{{ $student->faculties()->first()->name }}</td>
                                <td class="text-center text-truncate">{{ $student->financingTypes()->first()->name }}</td>
                                <td class="text-center">{{ is_null($student->enrollment->first()->decree_id) ? 'Нет' : 'Да' }}</td>
                                <td class="text-center">{{ $student->financingTypes()->first()->pivot->is_original_docs ? 'Да' : 'Нет' }}</td>
                                <td class="text-center">{{ $student->educational()->first()->avg_rating }}</td>
                                <td class="text-center">{{ $student->educational()->first()->admission_testing ?? '—' }}</td>
                                <td class="text-center d-flex justify-content-around align-items-center">@include('manage-buttons')</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif(isset($students) && $students->isEmpty())
                <p class="fs-5 text-danger mt-5">По выбранным параметрам личные дела не найдены.</p>
            @endif--}}

            <table class="table table-bordered table-striped">
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
                @if(isset($students))
                    @forelse ($students as $student)
                        <tr>
                            <th scope="row" class="text-center">{{ $student->id }}</th>
                            <td class="text-center">{{ $student->surname }}</td>
                            <td class="text-center">{{ $student->name }}</td>
                            <td class="text-center">{{ $student->patronymic }}</td>
                            <td class="d-flex justify-content-around align-items-center">@include('buttons.button-group-1')</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Ничего не найдено</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>

        @if(isset($students)/* && $students->isNotEmpty()*/)
            <div class="mt-3">
                {{ $students->links() }}
            </div>
        @endif
    </div>
@endsection

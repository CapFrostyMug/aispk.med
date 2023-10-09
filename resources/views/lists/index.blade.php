@extends('layouts.app')

@section('title', 'Просмотр и печать списков абитуриентов')

@section('content')
    <div class="custom-st-fullscreen-block">
        <div class="block1">
            <div class="#">
                <h2 class="fw-bold py-5">Просмотр и печать списков абитуриентов</h2>
            </div>

            @include('session-message')

            <form action="{{ route('students-lists.show') }}" method="get">
                @csrf
                <div class="d-flex justify-content-start align-items-end">
                    <div class="col-6">
                        <label for="faculty-1" class="form-label">Выберите специальность</label>
                        <select id="faculty-1" class="form-select" name="faculty" required>
                            <option value="">Выберите...</option>
                            @if(isset($faculties))
                                @foreach($faculties as $item)
                                    <option
                                        value="{{ $item->id }}"
                                        @if(isset($selectedFaculty) && $selectedFaculty == $item->name)
                                        selected
                                        @endif>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button class="col-2 btn btn-success px-5 ms-4" type="submit">Поиск</button>
                </div>
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

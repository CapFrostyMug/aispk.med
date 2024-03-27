@extends('layouts.app')

@section('title', 'Управление зачислением')

@section('content')
    <div class="#">
        <h2 class="fw-bold py-5">Управление зачислением</h2>
    </div>

    @include('session-message')

    <form action="{{ route('students-lists.manage.enrollment.search') }}"
          method="get"
          class="row col-8 align-items-end custom-fn-form custom-st-search-filter rounded p-3">
        @csrf
        <div class="col-9">
            <label for="faculty-id-1" class="form-label fw-bold">Специальность</label>
            <select id="faculty-id-1" class="form-select custom-fn-faculty-select" name="faculty_id" required>
                <option value="">Выберите...</option>
                @if(isset($faculties))
                    @foreach($faculties as $item)
                        <option value="{{ $item->id }}"
                                @if(request()->input('faculty_id') == $item->id) selected @endif>
                            {{ $item->name }}
                        </option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-3">
            <button class="btn btn-success px-5" type="submit">Поиск</button>
        </div>
    </form>

    @if(isset($students))
        <div class="col-12 d-flex justify-content-center my-4">
            <span>Найдено записей: {{ $students->total() }}</span>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr class="custom-results-table-bg-color">
                <th scope="col" class="col-1 text-center">Дело,&nbsp;№</th>
                <th scope="col" class="col-2 text-center">Фамилия</th>
                <th scope="col" class="col-2 text-center">Имя</th>
                <th scope="col" class="col-2 text-center">Отчество</th>
                <th scope="col" class="col-2 text-center">Приказ</th>
                <th scope="col" class="col-1 text-center">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($students as $student)
                <tr class="custom-fn-toggle-row-color {{ $student->decree ? 'table-success' : 'table-danger' }}">
                    <th scope="row" class="text-center align-middle">{{ $student->id }}</th>
                    <td class="text-center text-truncate align-middle">{{ $student->surname }}</td>
                    <td class="text-center text-truncate align-middle">{{ $student->name }}</td>
                    <td class="text-center text-truncate align-middle">{{ $student->patronymic }}</td>
                    <td class="text-center">
                        <select class="form-select custom-fn-decree-select" name="decree" data-student-id="{{ $student->id }}">
                            <option value="">Выберите...</option>
                            @foreach($decrees as $item)
                                <option value="{{ $item->id }}"
                                        @if($student->decree == $item->id) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-center align-middle">@include('buttons.button-group-6')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Ничего не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $students->links() }}
        </div>
    @endif
@endsection

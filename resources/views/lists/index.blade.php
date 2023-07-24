@extends('layouts.app')

@section('title')
    @parent Просмотр и печать списков абитуриентов
@endsection

@include('menu')

@section('content')
    <div class="row">

        <div class="col-12 py-5">
            <h2><strong>Просмотр и печать списков абитуриентов</strong></h2>
        </div>

        @include('sessionAlert')

        <form action="{{ route('students-lists.find') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-start align-items-end">
                <div class="col-6">
                    <label for="faculty-1" class="form-label">Выберите специальность</label>
                    <select id="faculty-1" class="form-select" name="faculty" required>
                        <option value="">Выберите...</option>
                        @foreach($faculties as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите вариант.
                    </div>
                </div>

                <div class="col-2 ms-3">
                    <button
                        class="btn btn-success px-5"
                        type="submit">Поиск
                    </button>
                </div>
            </div>
        </form>

        <div class="#">
            @include('lists.resultsTable')
        </div>

    </div>
@endsection

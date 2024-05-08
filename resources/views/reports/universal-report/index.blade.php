@extends('layouts.app')

@section('title', 'Универсальный отчёт')

@section('content')
    <div class="row">

        <div class="col-12">
            <h2 class="fw-bold pt-4 pb-3 pb-lg-5 ps-2 ps-lg-0">Универсальный отчёт</h2>
        </div>

        {{--<div class="col-12">
            @include('session-message')
        </div>--}}

        <div class="row">
            <div class="col-3">
                <form action="{{ route('reporting.universal-report.generate') }}" class="#">

                    <div class="border border-3 rounded py-4 px-3 mb-5">
                        <div class="form-check mb-2">
                            <input id="passport-1" class="form-check-input" name="passport" type="checkbox"
                                   @if (request()->input('passport')) checked @endif>
                            <label for="passport-1" class="form-check-label">Паспортные данные</label>
                        </div>
                        <div class="form-check mb-2">
                            <input id="faculties-1" class="form-check-input" name="faculties" type="checkbox"
                                   @if (request()->input('faculties')) checked @endif disabled>
                            <label for="faculties-1" class="form-check-label">Поступление</label>
                        </div>
                        <div class="form-check mb-2">
                            <input id="educational-1" class="form-check-input" name="educational" type="checkbox"
                                   @if (request()->input('educational')) checked @endif>
                            <label for="educational-1" class="form-check-label">Образование</label>
                        </div>
                        <div class="form-check mb-2">
                            <input id="seniority-1" class="form-check-input" name="seniority" type="checkbox"
                                   @if (request()->input('seniority')) checked @endif>
                            <label for="seniority-1" class="form-check-label">Трудовой стаж</label>
                        </div>
                        <div class="form-check mb-2">
                            <input id="specialCircumstances-1" class="form-check-input" name="specialCircumstances" type="checkbox"
                                   @if (request()->input('specialCircumstances')) checked @endif disabled>
                            <label for="specialCircumstances-1" class="form-check-label">Дополнительно</label>
                        </div>
                        <div class="form-check mb-2">
                            <input id="enrollment-1" class="form-check-input" name="enrollment" type="checkbox"
                                   @if (request()->input('enrollment')) checked @endif>
                            <label for="enrollment-1" class="form-check-label">Зачисление</label>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <button type="submit" class="btn btn-success mb-3" style="min-width: 130px">Сформировать</button>
                        <a class="btn btn-secondary" href="{{ route('reporting.universal-report.index') }}" role="button" style="min-width: 130px">Очистить</a>
                    </div>

                </form>
            </div>

            <div class="col-9">
                @if(isset($students))
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center align-middle custom-st-min-width-75">№</th>
                                <th scope="col" class="text-center align-middle custom-st-min-width-75">Дело, №</th>
                                <th scope="col" class="text-center align-middle">Фамилия</th>
                                <th scope="col" class="text-center align-middle">Имя</th>
                                <th scope="col" class="text-center align-middle">Отчество</th>
                                @if(isset($students[0]))
                                    @foreach($relations as $item)
                                        @include('reports.universal-report.table-blocks.thead.' . $item)
                                    @endforeach
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $student)
                                <tr>
                                    <td class="text-center align-content-center"></td>
                                    <td class="text-center align-content-center">{{ $student->id }}</td>
                                    <td class="text-center align-content-center">{{ $student->surname }}</td>
                                    <td class="text-center align-content-center">{{ $student->name }}</td>
                                    <td class="text-center align-content-center">{!! $student->patronymic ?? '&mdash;' !!}</td>
                                    @foreach($relations as $item)
                                        @include('reports.universal-report.table-blocks.tbody.' . $item)
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Ничего не найдено</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

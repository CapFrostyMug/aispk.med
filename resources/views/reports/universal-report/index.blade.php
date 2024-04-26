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
                <form action="{{ route('reporting.universal-report.generate') }}"
                      class="d-flex flex-column align-items-center">
                    <div class="accordion" id="accordion" style="min-width: 240px">
                        @include('reports.universal-report.filter-blocks.index')
                    </div>
                    <button type="submit" class="btn btn-success mt-4" style="width: 130px">Сформировать</button>
                    <a class="btn btn-secondary mt-3"
                       href="{{ route('reporting.universal-report.index') }}"
                       role="button"
                       style="width: 130px">Очистить
                    </a>
                    {{--<a class="btn btn-warning mt-3" href="{{ route('reporting.universal-report.export-list') }}" role="button" style="width: 130px">Экспорт</a>--}}
                </form>
            </div>

            <div class="col-9">
                @if(isset($students))
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @foreach($cellHeaders as $key => $value)
                                    <th scope="col" class="text-center align-middle"
                                        style="min-width: 150px;">{{ $value }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $student)
                                <tr>
                                    @foreach($student as $key => $value)
                                        @if(
                                            $key === 'students_created_at' ||
                                            $key === 'passports_birthday' ||
                                            $key === 'passports_issue_date' ||
                                            $key === 'educational_issue_date'
                                           )
                                            <td class="text-center align-content-center">{{ date('d.m.Y', strtotime($value)) }}</td>
                                        @elseif($value === 'male')
                                            <td class="text-center align-content-center">муж.</td>
                                        @elseif($value === 'female')
                                            <td class="text-center align-content-center">жен.</td>
                                        @elseif($key === 'educational_is_excellent_student' && $value === 0)
                                            <td class="text-center align-content-center">Нет</td>
                                        @elseif($key === 'educational_is_excellent_student' && $value === 1)
                                            <td class="text-center align-content-center">Да</td>
                                        @elseif($key === 'educational_is_first_spo' && $value === 0)
                                            <td class="text-center align-content-center">Нет</td>
                                        @elseif($key === 'educational_is_first_spo' && $value === 1)
                                            <td class="text-center align-content-center">Да</td>
                                        @elseif($key === 'enrollment_is_pickup_docs' && $value === 0)
                                            <td class="text-center align-content-center">Нет</td>
                                        @elseif($key === 'enrollment_is_pickup_docs' && $value === 1)
                                            <td class="text-center align-content-center">Да</td>
                                        @else
                                            <td class="text-center align-content-center">{{ $value }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="#" class="text-center">Ничего не найдено</td>
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

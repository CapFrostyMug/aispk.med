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
                <form action="{{ route('reporting.universal-report.generate') }}" class="d-flex flex-column align-items-center">
                    <div class="accordion" id="accordion" style="min-width: 240px">
                        @include('reports.universal-report.filter-blocks.index')
                    </div>
                    <button type="submit" class="btn btn-success mt-4" style="width: 130px">Сформировать</button>
                    <a class="btn btn-secondary mt-3" href="{{ route('reporting.universal-report.index') }}" role="button" style="width: 130px">Очистить</a>
                </form>
            </div>

            <div class="col-9">
                @if(isset($students))
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @foreach($cellHeaders as $key => $value)
                                    <th scope="col" class="text-center align-middle" style="min-width: 150px;">{{ $value }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $student)
                                <tr>
                                    @foreach($student as $key => $value)
                                        <td class="text-center align-content-center">{{ $value }}</td>
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

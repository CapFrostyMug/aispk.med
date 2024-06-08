@extends('layouts.app')

@section('title', 'Универсальный отчёт')

@section('content')
    <div class="row">

        <div class="col-12">
            <h2 class="fw-bold pt-4 pb-3 pb-lg-5 ps-2 ps-lg-0">Универсальный отчёт</h2>
        </div>

        <div class="col-12">
            @include('session-message')
        </div>

        <div class="row">
            <div class="col-3">
                <form action="{{ route('reporting.universal-report.generate') }}" class="#">
                    @include('reports.universal-report.filter')
                    <div class="d-flex flex-column">
                        <button type="submit" class="btn btn-success mb-3">Сформировать</button>
                        @if(request()->input('report'))
                            <a class="btn btn-primary custom-fn-spinner mb-3"
                               href="{{ route('reporting.universal-report.export-list', request()->input()) }}"
                               role="button">Печать
                            </a>
                            <button class="btn btn-primary custom-fn-spinner mb-3" type="button" disabled hidden>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Загрузка...
                            </button>
                        @endif
                        <a class="btn btn-secondary"
                           href="{{ route('reporting.universal-report.index') }}"
                           role="button">Очистить
                        </a>
                    </div>
                </form>
            </div>

            <div class="col-9">
                @if(isset($students))
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @include('reports.universal-report.table-blocks.thead.index')
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($students as $student)
                                <tr>
                                    @include('reports.universal-report.table-blocks.tbody.index')
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Ничего не найдено</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12 my-3">
                        {{ $students->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

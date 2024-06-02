@extends('layouts.app')

@section('title', 'Статистика поданных заявлений')

@section('content')
    <div class="row">

        <div class="row d-flex justify-content-between pt-4 pb-5 pe-0">
            <h2 class="col-auto fw-bold">Статистика поданных заявлений</h2>
            <div class="col-auto p-0">
                <a class="btn btn-primary"
                   href="{{ route('reporting.statistics.export-list') }}"
                   role="button"
                   style="min-width: 130px">Печать
                </a>
            </div>
        </div>

        {{--<div class="col-12">
            @include('session-message')
        </div>--}}

        @if(isset($data))
            @php $counter = 1; @endphp
            <div class="col-12">
                <table class="table table-bordered table-striped mb-5">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">№</th>
                        <th scope="col" class="text-center">Специальность</th>
                        <th scope="col" class="text-center">Бюджет</th>
                        <th scope="col" class="text-center">Договор</th>
                        <th scope="col" class="text-center">Возможен договор</th>
                        <th scope="col" class="text-center">Всего</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($data))
                        @foreach($data['faculties'] as $item)
                            <tr>
                                <th scope="row" class="text-center align-center">{{ $counter }}</th>
                                <td class="text-start align-center">{{ $item['name'] }}</td>
                                <td class="text-center align-center">{{ $item['budget'] }}</td>
                                <td class="text-center align-center">{{ $item['contract'] }}</td>
                                <td class="text-center align-center">{{ $item['contractPossible'] }}</td>
                                <td class="text-center align-center">{{ $item['totalCount'] }}</td>
                            </tr>
                            @php $counter++; @endphp
                        @endforeach
                        <tr>
                            <th colspan="2"></th>
                            <th class="text-center align-center">{{ $data['calc']['budget'] }}</th>
                            <th class="text-center align-center">{{ $data['calc']['contract'] }}</th>
                            <th class="text-center align-center">{{ $data['calc']['contractPossible'] }}</th>
                            <th class="text-center align-center">{{ $data['calc']['totalCount'] }}</th>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Ничего не найдено</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

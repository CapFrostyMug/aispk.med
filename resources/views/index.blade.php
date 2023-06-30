@extends('layouts.app')

@section('title')
    @parent Главная
@endsection

@include('menu')

@section('content')
    <div class="row">
        <div class="col-12 my-5">
            <h2 class="text-center">
                <strong>Главная страница</strong>
                {{--<strong>Добро пожаловать в приложение для приёмной комиссии Тюменского медицинского коллежда!</strong>--}}
            </h2>
        </div>
        {{--<div class="col-12 my-5 border border-2 border-warning p-4">
            <p class="fs-5">Пожалуйста, обратите внимание, что приложение находится на&nbsp;стадии
                <strong>альфа-версии</strong> (ранней стадии разработки). В&nbsp;виду этого не&nbsp;все пункты меню
                доступны. Доступные&nbsp;же разделы сайта не&nbsp;всегда могут работать корректно. Кроме того, итоговый
                внешний вид
                и наполнение сайта могут существенно отличаться от того, что вы видите сейчас.
            </p>
        </div>--}}
    </div>
@endsection

@extends('layouts.app')

@section('title')
    @parent Редактирование профиля
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Страница редактирования профиля пользователя</h1>
@endsection

@extends('layouts.app')

@section('title')
    @parent Поиск
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Страница поиска анкеты для последующего редактирования/просмотра</h1>
@endsection

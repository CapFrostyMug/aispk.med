@extends('layouts.app')

@section('title')
    @parent Редактирование категории
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Страница редактирования категории</h1>
@endsection

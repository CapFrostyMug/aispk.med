@extends('layouts.app')

@section('title')
    @parent Список
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Список всех пользователей/категорий</h1>
@endsection

@extends('layouts.app')

@section('title')
    @parent Главная
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1>Главная страница</h1>
@endsection

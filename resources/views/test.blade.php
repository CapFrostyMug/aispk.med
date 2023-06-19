@extends('layouts.app')

@section('title')
    @parent Тестовая страница
@endsection

@section('personal-files.menu')
    @include('personal-files.menu')
@endsection

@section('admin.menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="py-5">
        <h2><strong></strong></h2>
    </div>

    <form method="POST" action="{{ route() }}" id="my-form">
        @csrf
        {{----}}
    </form>
@endsection

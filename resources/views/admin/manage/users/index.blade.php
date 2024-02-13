@extends('layouts.app')

@section('title', 'Управление пользователями')

@section('content')
    <h2 class="fw-bold py-5">Управление пользователями</h2>
    <div class="row">
        @include('session-message')
        <div class="col-6">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col" class="col-1 text-center">№</th>
                    <th scope="col" class="col-10 text-center">Пользователь</th>
                    <th scope="col" class="col-1 text-center">Управление</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="text-center align-middle">1</th>
                    <td class="text-start align-middle">Екатерина Соколова</td>
                    <td class="text-center align-middle"><a href="{{ route('admin.manage.users.user.show', 1) }}">*Ссылка*</a></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center align-middle">2</th>
                    <td class="text-start align-middle">Надежда Юрьева</td>
                    <td class="text-center align-middle"><a href="{{ route('admin.manage.users.user.show', 2) }}">*Ссылка*</a></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center align-middle">3</th>
                    <td class="text-start align-middle">Дарья Боброва</td>
                    <td class="text-center align-middle"><a href="{{ route('admin.manage.users.user.show', 3) }}">*Ссылка*</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

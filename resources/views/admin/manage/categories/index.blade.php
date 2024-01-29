@extends('layouts.app')

@section('title')
    @if(request()->routeIs('admin.manage.categories'))
        Управление категориями
    @elseif(request()->routeIs('admin.manage.category.show'))
        Управление категорией: {{ request()->query('category') }}
    @endif
@endsection

@section('content')
    <h2 class="fw-bold py-5">
        @if(request()->routeIs('admin.manage.categories'))
            Управление категориями
        @elseif(request()->routeIs('admin.manage.category.show'))
            Управление категорией: «{{ request()->query('category') }}»
        @endif
    </h2>

    <div class="row">
        <div class="col-6">
            @if(request()->routeIs('admin.manage.category.show'))
                <form
                    action="{{ route('admin.manage.category.store', ['table' => request()->query('table')]) }}"
                    method="post"
                    class="mb-5">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="newItem-1" class="form-label"></label>
                        <input id="newItem-1"
                               class="form-control @error('newItem') is-invalid @enderror"
                               name="newItem"
                               value="{{ old('newItem') ?? $newItem->name ?? '' }}"
                               type="text"
                               placeholder="Новый элемент"
                               required
                               aria-describedby="newItem-1-validation">
                        @error('newItem')
                        <div id="newItem-1-validation" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <button class="btn btn-outline-secondary rounded-0" title="Добавить" type="submit"
                                id="button-addon2">
                            <span class="fw-bold fs-5">+</span>
                        </button>
                    </div>
                </form>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col" class="col-1 text-center">№</th>
                    <th scope="col" class="col-11 text-center">Наименование</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($data))
                    @php $counter = 1; @endphp
                    @forelse ($data as $item)
                        <tr>
                            <th scope="row" class="text-center">{{ $counter }}</th>
                            <th scope="row" class="text-start align-middle p-0">
                                @if(request()->routeIs('admin.manage.categories'))
                                    <a href="{{ route('admin.manage.category.show', ['slug' => $item->slug,
                                                                                     'table' => $item->table,
                                                                                     'category' => $item->name]) }}"
                                       class="text-decoration-none d-block h-100 p-2">{{ $item->name }}</a>
                                @else
                                    <span
                                        class="d-inline-block text-truncate align-middle ms-3">{{ $item->name }}</span>
                                @endif
                            </th>
                        </tr>
                        @php $counter++; @endphp
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Список категорий пуст</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

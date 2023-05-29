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
        <h2><strong>Тестовая форма</strong></h2>
    </div>

    @include('personal-files.form.form-blocks.facultyBlockForCloning')

    <form method="POST" action="{{ route('test') }}" id="my-form">
        @csrf
        <div class="row gy-3 faculty-block-parent">

            <div class="row mb-4 faculty-block-child">
                <div class="col-6">
                    <label for="faculty-1" class="form-label">Наименование специальности*</label>
                    <select id="faculty-1" class="form-select test" name="data[faculty]" required>
                        <option value=""
                                @if(!old('faculty')) selected @endif
                        >Выберите...
                        </option>
                        @foreach($faculties as $item)
                            <option
                                value="{{ $item->id }}"
                                @if($item->id == old('faculty')) selected @endif
                            >{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите вариант.
                    </div>
                    <div class="form-check">
                        <input id="original-docs-1" type="hidden" name="data[originalDocs]" value="0">
                        <input id="original-docs-1" class="form-check-input parent-checkbox" name="data[originalDocs]"
                               value="1" type="checkbox"
                               @if (old('originalDocs') == '1') checked @endif>
                        <label for="original-docs-1" class="form-check-label">Оригиналы документов</label>
                    </div>
                </div>

                <div class="col-3">
                    <label for="financing-1" class="form-label">Финансирование*</label>
                    <select id="financing-1" class="form-select" name="data[financing]" required>
                        <option value=""
                                @if(!old('financing')) selected @endif
                        >Выберите...
                        </option>
                        @foreach($financing as $item)
                            <option
                                value="{{ $item->id }}"
                                @if($item->id == old('financing')) selected @endif
                            >{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите вариант.
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5 gy-3 ">
            <div class="col-12">
                <button type="button" class="btn btn-link text-decoration-none p-0 add-faculty">
                    <strong>Добавить ещё специальность...</strong>
                </button>
            </div>
        </div>

        <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-success" type="submit">Сохранить</button>
        </div>
    </form>
@endsection

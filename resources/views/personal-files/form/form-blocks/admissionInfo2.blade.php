@php
    if (@old('data')) $data = @old('data');
@endphp

<div class="row gy-3 faculty-block-parent">
    @if(isset($data))
        {{--
            ВАРИАНТЫ

            1. Сработал flash(), может вернуться более одного блока => нужен цикл; возвращается $data

            2. Редактирование анкеты, пришли данные из БД => как и в первом случае, нужен цикл; возвращается $data
        --}}
        @foreach($data as $blockName => $blockContent)
            @include('personal-files.form.form-blocks.facultyBlockForCloning2')
        @endforeach
    @else
        {{--
            Первая загрузка анкеты (пустая анкета) => выполняем просто @include;
             NAME-ы должны быть в формате data[{{ blockNumber }}][faculty_id]
        --}}
        @include('personal-files.form.form-blocks.facultyBlockForCloning2')
    @endif
</div>

<div class="row mb-5 gy-3">
    <div class="col-12">
        <button type="button" class="btn btn-link text-decoration-none p-0 add-faculty">
            <strong>Добавить ещё специальность...</strong>
        </button>
    </div>
</div>

@php
    if (@old('data')) $facultiesBlocks = @old('data');
@endphp

<div class="row gy-3 custom-faculty-block-parent">
    @if(isset($facultiesBlocks))
        @foreach($facultiesBlocks as $blockName => $blockContent)
            @include('personal-files.form.form-blocks.facultyBlock')
        @endforeach
    @else
        @include('personal-files.form.form-blocks.facultyBlock')
    @endif
</div>

<div class="row mb-5 gy-3">
    <div class="col-12">
        <button type="button" class="btn btn-link text-decoration-none p-0 custom-add-faculty">
            <strong>Добавить ещё специальность...</strong>
        </button>
    </div>
</div>

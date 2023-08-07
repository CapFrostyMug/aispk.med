<a href="{{ route('personal-file.manage.show', $student->id) }}" class="text-decoration-none" title="Просмотр">
    @include('icons.manage-buttons.show')
</a>
<a href="{{ route('personal-file.manage.edit', $student->id) }}" class="text-decoration-none" title="Редактировать">
    @include('icons.manage-buttons.edit')
</a>
<a href="{{ route('personal-file.manage.print', $student->id) }}" class="text-decoration-none" title="Печать">
    @include('icons.manage-buttons.print')
</a>
<button type="button"
        class="btn btn-link custom-fn-personal-file-remove p-0"
        data-student-id="{{ $student->id }}">@include('icons.manage-buttons.remove')
</button>

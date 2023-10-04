<a href="{{ route('personal-file.manage.show', $student->id) }}" class="text-decoration-none" title="Просмотр">
    @include('icons.manage-buttons.show')
</a>
<a href="{{ route('personal-file.manage.edit', $student->id) }}" class="text-decoration-none" title="Редактировать">
    @include('icons.manage-buttons.edit')
</a>

<div class="dropdown">
    <button class="btn btn-link dropdown-toggle text-decoration-none custom-st-dropdown-menu p-0"
            type="button"
            id="dropdownMenuPrintWord"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            title="Печать">@include('icons.manage-buttons.print')
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrintWord">
        <li>
            <a href="{{ route('personal-file.manage.export-application', $student->id) }}"
               class="text-decoration-none dropdown-item">Печать заявления
            </a>
        </li>
        <li>
            <a href="{{ route('personal-file.manage.export', $student->id) }}"
               class="text-decoration-none dropdown-item disabled">Печать личного дела
            </a>
        </li>
    </ul>
</div>

<button type="button"
        class="btn btn-link custom-fn-personal-file-remove p-0"
        data-student-id="{{ $student->id }}"
        title="Удалить">@include('icons.manage-buttons.remove')
</button>

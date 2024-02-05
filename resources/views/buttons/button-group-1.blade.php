<a href="{{ route('personal-file.manage.show', $student->id) }}" class="text-decoration-none" title="Просмотр">
    @include('icons.buttons.button-group-1.show')
</a>
<a href="{{ route('personal-file.manage.edit', $student->id) }}" class="text-decoration-none" title="Редактировать">
    @include('icons.buttons.button-group-1.edit')
</a>

<div class="dropdown">
    <button class="btn btn-link dropdown-toggle text-decoration-none custom-st-dropdown-menu p-0"
            type="button"
            id="dropdownMenuPrintWord"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            title="Печать">@include('icons.buttons.button-group-1.print')
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuPrintWord">
        <li>
            <a href="{{ route('personal-file.manage.export-application', $student->id) }}"
               class="text-decoration-none dropdown-item">Печать заявления
            </a>
        </li>
        <li>
            <a href="{{ route('personal-file.manage.export-file', $student->id) }}"
               class="text-decoration-none dropdown-item disabled">Печать личного дела
            </a>
        </li>
    </ul>
</div>

<button type="button"
        class="btn btn-link custom-fn-remove p-0"
        data-item-id="{{ $student->id }}"
        data-delete-url="{{ route('personal-file.manage.destroy', $student->id) }}"
        data-reload-page="1"
        title="Удалить">@include('icons.buttons.button-group-1.remove')
</button>

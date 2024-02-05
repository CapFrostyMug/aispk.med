{{--<a href="{{ url()->previous() }}" class="#"></a>--}}
@if(request()->routeIs('personal-file.manage.show'))
    <a class="btn btn-outline-secondary"
       href="{{ route('personal-file.manage.edit', $student->id) }}"
       role="button">Редактировать @include('icons.buttons.button-group-2.edit')
    </a>
@endif
<button class="btn btn-outline-secondary dropdown-toggle rounded-end-0 text-decoration-none"
        type="button"
        id="dropdownMenuPrintWord"
        data-bs-toggle="dropdown"
        aria-expanded="false"
        title="Печать">Печать @include('icons.buttons.button-group-2.print')
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
<button type="button"
        class="btn btn-danger custom-fn-remove"
        data-item-id="{{ $student->id }}"
        data-delete-url="{{ route('personal-file.manage.destroy', $student->id) }}">
    Удалить @include('icons.buttons.button-group-2.remove')
</button>

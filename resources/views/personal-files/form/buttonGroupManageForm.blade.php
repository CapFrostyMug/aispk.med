<div class="btn-group" role="group">
    <a class="btn btn-outline-secondary"
       href="{{ route('personal-file.management.search') }}"
       role="button">
        @if (request()->routeIs('personal-file.management.show'))
            {{__('Вернуться')}} @include('icons.return')
        @else
            {{__('Отмена')}} @include('icons.cancel')
        @endif
    </a>

    @if (request()->routeIs('personal-file.management.show'))
        <a class="btn btn-outline-secondary"
           href="{{ route('personal-file.management.edit', $student->id) }}"
           role="button">Редактировать @include('icons.edit')
        </a>
    @endif

    <a class="btn btn-outline-secondary"
       href="{{ route('personal-file.management.print', $student->id) }}"
       role="button">Печать @include('icons.print')
    </a>

    <a class="btn btn-danger"
       href="{{ route('personal-file.management.destroy', $student->id) }}"
       role="button">Удалить @include('icons.trashCreateFormHeader')
    </a>
</div>

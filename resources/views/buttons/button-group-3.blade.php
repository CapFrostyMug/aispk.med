<a href="#" class="text-decoration-none" title="Редактировать">
    @include('icons.buttons.button-group-3.edit')
</a>
<button type="button"
        class="btn btn-link custom-fn-remove p-0"
        data-item-id="{{ $item->id }}"
        data-delete-url="{{ route('admin.manage.category.destroy', ['id' => $item->id, 'table' => request()->query('table')]) }}"
        data-reload-page="1"
        title="Удалить">@include('icons.buttons.button-group-3.remove')
</button>

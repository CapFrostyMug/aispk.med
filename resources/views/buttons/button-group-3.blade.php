<button type="button"
        class="btn btn-link custom-fn-remove"
        data-item-id="{{ $item->id }}"
        data-delete-url="{{ route('admin.manage.categories.category.destroy', ['id' => $item->id, 'table' => request()->query('table')]) }}"
        data-reload-page="1"
        title="Удалить"
        @if (!$item->permission_remove) disabled="disabled" @endif>@include('icons.buttons.button-group-3.remove')
</button>

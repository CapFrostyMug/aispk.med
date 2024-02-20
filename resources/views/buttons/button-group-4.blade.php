<a href="{{ route('admin.manage.users.user.show', $item->id) }}" class="text-decoration-none"
   title="Просмотр">
    @include('icons.buttons.button-group-1.show')
</a>

<a href="{{ route('admin.manage.users.user.edit', $item->id) }}" class="text-decoration-none"
   title="Редактировать">
    @include('icons.buttons.button-group-1.edit')
</a>

<button type="button"
        class="btn btn-link custom-fn-remove p-0"
        data-item-id="{{ $item->id }}"
        {{--data-delete-url="{{ route('admin.manage.users.user.destroy', $item->id) }}"--}}
        title="Удалить">@include('icons.buttons.button-group-1.remove')
</button>

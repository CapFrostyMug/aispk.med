@php
    if (@old('circumstance')) $circumstance = @old('circumstance');
@endphp

<div class="row mb-3 gy-3"> {{-- ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ --}}
    @forelse($specialCircumstances as $item)
        <div class="col-4">
            <p class="col-12 mb-2">{{ $item->name }}</p>
            <div class="form-check form-check-inline">
                <input id="circumstance-{{ $item->id }}-false"
                       class="form-check-input"
                       name="circumstance[{{ $item->id }}]"
                       value="0"
                       type="radio"
                       checked>
                <label for="circumstance-{{ $item->id }}-false" class="form-check-label">Нет</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="circumstance-{{ $item->id }}-true"
                       class="form-check-input"
                       name="circumstance[{{ $item->id }}]"
                       value="1"
                       type="radio"
                       @if (isset($circumstance) && $circumstance[$item->id] == '1') checked @endif>
                <label for="circumstance-{{ $item->id }}-true" class="form-check-label">Да</label>
            </div>
        </div>
    @empty
        <p class="fs-6 text-danger">
            Список &laquo;<strong>«Особые обстоятельства»</strong>&raquo; пуст. Через <strong>панель
                администратора</strong> добавьте элементы в&nbsp;список.
        </p>
    @endforelse
</div>
<div class="row mb-5 gy-3">
    <div class="col-6">
        <label for="about-me-1" class="form-label">О себе</label>
        <textarea id="about-me-1" class="form-control" name="aboutMe" rows="4">{{ old('aboutMe') }}</textarea>
    </div>
</div>

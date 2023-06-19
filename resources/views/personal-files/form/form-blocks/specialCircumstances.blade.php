@php
    if (isset($specialCircumstancesForEdit)) $specialCircumstances = $specialCircumstancesForEdit;
@endphp

<div class="row mb-3 gy-3"> {{-- ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ --}}
    @forelse($specialCircumstances as $circumstance)
        <div class="col-4">
            <p class="col-12 mb-2">{{ $circumstance->name }}</p>
            <div class="form-check form-check-inline">
                <input id="circumstance-{{ $circumstance->id }}-false"
                       class="form-check-input"
                       name="circumstance[{{ $circumstance->id }}]"
                       value="0"
                       type="radio"
                       checked>
                <label for="circumstance-{{ $circumstance->id }}-false" class="form-check-label">Нет</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="circumstance-{{ $circumstance->id }}-true"
                       class="form-check-input"
                       name="circumstance[{{ $circumstance->id }}]"
                       value="1"
                       type="radio"
                       @if (old('circumstance') == 1 ||
                       (isset($circumstance->pivot->status) && $circumstance->pivot->status == 1)) checked @endif>
                <label for="circumstance-{{ $circumstance->id }}-true" class="form-check-label">Да</label>
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
        <textarea id="about-me-1" class="form-control" name="aboutMe" rows="4">{{ old('aboutMe') ?? $student->about_me ?? '' }}</textarea>
    </div>
</div>

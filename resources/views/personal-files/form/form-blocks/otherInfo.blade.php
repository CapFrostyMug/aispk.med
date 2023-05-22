<div class="row mb-5 gy-3"> {{-- ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ --}}

    <div class="row mb-4 mt-3">
        <div class="col-4">
            <p class="col-12 mb-2">Потребность в общежитии</p>
            <div class="form-check form-check-inline">
                <input id="hostel-false-1" class="form-check-input" name="hostel" value="0" type="radio" checked>
                <label for="hostel-false-1" class="form-check-label">Нет</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="hostel-true-1" class="form-check-input" name="hostel" value="1" type="radio"
                       @if (old('hostel') == '1') checked @endif>
                <label for="hostel-true-1" class="form-check-label">Да</label>
            </div>
        </div>

        <div class="col-4">
            <p class="col-12 mb-2">Наличие инвалидности</p>
            <div class="form-check form-check-inline">
                <input id="disability-false-1" class="form-check-input" name="disability" value="0" type="radio"
                       checked>
                <label for="disability-false-1" class="form-check-label">Нет</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="disability-true-1" class="form-check-input" name="disability" value="1" type="radio"
                       @if (old('disability') == '1') checked @endif>
                <label for="disability-true-1" class="form-check-label">Да</label>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-4">
            <p class="col-12 mb-2">Абитуриент является сиротой</p>
            <div class="form-check form-check-inline">
                <input id="orphan-false-1" class="form-check-input" name="orphan" value="0" type="radio" checked>
                <label for="orphan-false-1" class="form-check-label">Нет</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="orphan-true-1" class="form-check-input" name="orphan" value="1" type="radio"
                       @if (old('orphan') == '1') checked @endif>
                <label for="orphan-true-1" class="form-check-label">Да</label>
            </div>
        </div>

        <div class="col-4">
            <p class="col-12 mb-2">Абитуриент является иностранцем</p>
            <div class="form-check form-check-inline">
                <input id="alien-false-1" class="form-check-input" name="alien" value="0" type="radio" checked>
                <label for="alien-false-1" class="form-check-label">Нет</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="alien-true-1" class="form-check-input" name="alien" value="1" type="radio"
                       @if (old('alien') == '1') checked @endif>
                <label for="alien-true-1" class="form-check-label">Да</label>
            </div>
        </div>
    </div>

    <div class="col-8 mt-0 mb-3">
        <p class="col-12 mb-2">Абитуриент нуждается в создании специальных условий при проведении вступительных
            испытаний</p>
        <div class="form-check form-check-inline">
            <input id="special-conditions-false-1" class="form-check-input" name="specialConditions" value="0"
                   type="radio" checked>
            <label for="special-conditions-false-1" class="form-check-label">Нет</label>
        </div>
        <div class="form-check form-check-inline">
            <input id="special-conditions-true-1" class="form-check-input" name="specialConditions" value="1"
                   type="radio" @if (old('specialConditions') == '1') checked @endif>
            <label for="special-conditions-true-1" class="form-check-label">Да</label>
        </div>
    </div>

    <div class="col-8">
        <label for="about-me-1" class="form-label">О себе</label>
        <textarea id="about-me-1" class="form-control" name="aboutMe" rows="3">{{ old('aboutMe') }}</textarea>
    </div>

</div>

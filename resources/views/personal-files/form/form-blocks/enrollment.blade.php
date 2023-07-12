<div class="row mb-5 gy-3"> {{-- ИНФОРМАЦИЯ О ЗАЧИСЛЕНИИ --}}
    <div class="col-6">
        <label for="faculty-admitted-1" class="form-label">Зачислен на специальность</label>
        <select id="faculty-admitted-1"
                class="form-select"
                name="facultyAdmitted">
            <option value="" @if(!old('facultyAdmitted') || !isset($enrollment)) selected @endif>Выберите...</option>
            @foreach($faculties as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('facultyAdmitted') ||
                    (isset($enrollment) && $enrollment->faculty_id == $item->id))
                        selected
                    @endif>
                        {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <label for="decree-1" class="form-label">Номер приказа</label>
        <select id="decree-1"
                class="form-select"
                name="decree">
            <option value="" @if(!old('decree') || !isset($enrollment)) selected @endif>Выберите...</option>
            @foreach($decrees as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('decree') ||
                    (isset($enrollment) && $enrollment->decree_id == $item->id))
                        selected
                    @endif>
                        {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <p class="mt-2 mb-2">Абитуриент забрал документы</p>
        <div class="form-check form-check-inline">
            <input id="pickup-docs-false-1" class="form-check-input" name="pickupDocs" value="0" type="radio" checked>
            <label class="form-check-label" for="pickup-docs-false-1">Нет</label>
        </div>
        <div class="form-check form-check-inline">
            <input id="pickup-docs-true-1"
                   class="form-check-input"
                   name="pickupDocs"
                   value="1"
                   type="radio"
                   @if (old('pickupDocs') == '1' ||
                   (isset($enrollment) && $enrollment->is_pickup_docs == 1)) checked @endif>
            <label for="pickup-docs-true-1" class="form-check-label">Да</label>
        </div>
    </div>
</div>

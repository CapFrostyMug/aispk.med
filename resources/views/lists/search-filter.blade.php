<div class="row custom-st-search-filter rounded p-3">
    <div class="col-6">
        <label for="faculty-1" class="form-label fw-bold">Специальность</label>
        <select id="faculty-1" class="form-select" name="faculty">
            <option value="">Выберите...</option>
            @if(isset($faculties))
                @foreach($faculties as $item)
                    <option
                        value="{{ $item->id }}"
                        @if(isset($selectedFaculty) && $selectedFaculty == $item->name)
                        selected
                        @endif>
                        {{ $item->name }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="col-2">
        <p class="fw-bold mb-1">Тип финансирования</p>
        <div class="form-check">
            <input id="financing-type-budget-1"
                   class="form-check-input"
                   name="financingType[Budget]"
                   value="1"
                   type="checkbox">
            <label for="financing-type-budget-1"
                   class="form-check-label">бюджет</label>
        </div>
        <div class="form-check">
            <input id="financing-type-contract-1"
                   class="form-check-input"
                   name="financingType[Contract]"
                   value="1"
                   type="checkbox">
            <label for="financing-type-contract-1"
                   class="form-check-label">договор</label>
        </div>
        <div class="form-check">
            <input id="financing-type-contract-possible-1"
                   class="form-check-input"
                   name="financingType[ContractPossible]"
                   value="1"
                   type="checkbox">
            <label for="financing-type-contract-possible-1"
                   class="form-check-label">возможен договор</label>
        </div>
    </div>
    <div class="col-2 border-start border-white border-3">
        <p class="fw-bold mb-1">Статус абитуриента</p>
        <div class="form-check">
            <input id="student-status-enrolled-1"
                   class="form-check-input"
                   name="studentStatus[Enrolled]"
                   value="1"
                   type="checkbox">
            <label for="student-status-enrolled-1"
                   class="form-check-label">зачислен</label>
        </div>
        <div class="form-check">
            <input id="student-status-not-enrolled-1"
                   class="form-check-input"
                   name="studentStatus[NotEnrolled]"
                   value="1"
                   type="checkbox">
            <label for="student-status-not-enrolled-1"
                   class="form-check-label">не зачислен</label>
        </div>
    </div>
    <div class="col-2 border-start border-white border-3">
        <p class="fw-bold mb-1">Тип документов</p>
        <div class="form-check">
            <input id="docs-type-originals-1"
                   class="form-check-input"
                   name="docsType[Originals]"
                   value="1"
                   type="checkbox">
            <label for="docs-type-originals-1"
                   class="form-check-label">оригиналы</label>
        </div>
        <div class="form-check">
            <input id="docs-type-copies-1"
                   class="form-check-input"
                   name="docsType[Copies]"
                   value="1"
                   type="checkbox">
            <label for="docs-type-copies-1"
                   class="form-check-label">копии</label>
        </div>
    </div>
    <div class="col-12 mt-3">
        <button class="col-2 btn btn-success me-3" type="submit">Поиск</button>
        <button class="col-2 btn btn-secondary custom-fn-reset-form" type="button">Очистить</button>
    </div>
</div>

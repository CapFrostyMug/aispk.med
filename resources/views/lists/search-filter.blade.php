<div class="row custom-st-search-filter rounded p-3">
    <div class="col-6">
        <label for="faculty-1" class="form-label fw-bold">Специальность</label>
        <select id="faculty-1" class="form-select" name="faculty">
            <option class="custom-fn-reset-filter" value="">Выберите...</option>
            @if(isset($faculties))
                @foreach($faculties as $item)
                    <option
                        class="custom-fn-reset-filter"
                        value="{{ $item->id }}"
                        @if(isset($request['faculty']) && $request['faculty'] == $item->id)
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
                   class="form-check-input custom-fn-reset-filter"
                   name="financingType[Budget]"
                   value="1"
                   type="checkbox"
                   @if(isset($request['financingType']['Budget'])) checked @endif>
            <label for="financing-type-budget-1"
                   class="form-check-label">бюджет</label>
        </div>
        <div class="form-check">
            <input id="financing-type-contract-1"
                   class="form-check-input custom-fn-reset-filter"
                   name="financingType[Contract]"
                   value="2"
                   type="checkbox"
                   @if(isset($request['financingType']['Contract'])) checked @endif>
            <label for="financing-type-contract-1"
                   class="form-check-label">договор</label>
        </div>
        <div class="form-check">
            <input id="financing-type-contract-possible-1"
                   class="form-check-input custom-fn-reset-filter"
                   name="financingType[ContractPossible]"
                   value="3"
                   type="checkbox"
                   @if(isset($request['financingType']['ContractPossible'])) checked @endif>
            <label for="financing-type-contract-possible-1"
                   class="form-check-label">возможен договор</label>
        </div>
    </div>
    <div class="col-2 border-start border-white border-3">
        <p class="fw-bold mb-1">Статус абитуриента</p>
        <div class="form-check">
            <input id="student-status-enrolled-1"
                   class="form-check-input custom-fn-reset-filter"
                   name="studentStatus[Enrolled]"
                   value="1"
                   type="checkbox"
                   @if(isset($request['studentStatus']['Enrolled'])) checked @endif>
            <label for="student-status-enrolled-1"
                   class="form-check-label">зачислен</label>
        </div>
        <div class="form-check">
            <input id="student-status-not-enrolled-1"
                   class="form-check-input custom-fn-reset-filter"
                   name="studentStatus[NotEnrolled]"
                   value="0"
                   type="checkbox"
                   @if(isset($request['studentStatus']['NotEnrolled'])) checked @endif>
            <label for="student-status-not-enrolled-1"
                   class="form-check-label">не зачислен</label>
        </div>
    </div>
    <div class="col-2 border-start border-white border-3">
        <p class="fw-bold mb-1">Тип документов</p>
        <div class="form-check">
            <input id="docs-type-originals-1"
                   class="form-check-input custom-fn-reset-filter"
                   name="docsType[Originals]"
                   value="1"
                   type="checkbox"
                   @if(isset($request['docsType']['Originals'])) checked @endif>
            <label for="docs-type-originals-1"
                   class="form-check-label">оригиналы</label>
        </div>
        <div class="form-check">
            <input id="docs-type-copies-1"
                   class="form-check-input custom-fn-reset-filter"
                   name="docsType[Copies]"
                   value="0"
                   type="checkbox"
                   @if(isset($request['docsType']['Copies'])) checked @endif>
            <label for="docs-type-copies-1"
                   class="form-check-label">копии</label>
        </div>
    </div>
    <div class="col-12 mt-3">
        <button class="col-2 btn btn-success me-3" type="submit">Поиск</button>
        <a class="col-2 btn btn-secondary"
           href="{{ route('students-lists.view-and-print.filter') }}"
           role="button">Очистить
        </a>
    </div>
</div>

<div class="row mb-5 gy-3"> {{-- ИНФОРМАЦИЯ О ЗАЧИСЛЕНИИ --}}
    <div class="col-6">
        <label for="faculty-admitted-1" class="form-label">Зачислен на специальность</label>
        <select id="faculty-admitted-1" class="form-select" name="facultyAdmitted">
            <option value="">Выберите...</option>
            <option>34.01.01 Младшая медицинская сестра по уходу за больными</option>
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
    <div class="col-2">
        <label for="decree-1" class="form-label">Номер приказа</label>
        <select id="decree-1" class="form-select" name="decree">
            <option value="">Выберите...</option>
            <option>311/У</option>
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
    <div class="col-12">
        <p class="mt-2 mb-2">Абитуриент забрал документы</p>
        <div class="form-check form-check-inline">
            <input id="pickup-docs-true-1" class="form-check-input" name="pickupDocs" value="" type="radio">
            <label for="pickup-docs-true-1" class="form-check-label">Да</label>
        </div>
        <div class="form-check form-check-inline">
            <input id="pickup-docs-false-1" class="form-check-input" name="pickupDocs" value="" type="radio" checked>
            <label class="form-check-label" for="pickup-docs-false-1">Нет</label>
        </div>
    </div>
</div>

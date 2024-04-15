<div class="accordion-item">
    <h2 class="accordion-header" id="headingEnrollment">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnrollment"
                aria-expanded="false" aria-controls="collapseEnrollment">
            Зачисление
        </button>
    </h2>
    <div id="collapseEnrollment" class="accordion-collapse collapse" aria-labelledby="headingEnrollment">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="faculty-admitted-1" class="form-check-input" name="faculties[name]" value="Зачислен на специальность" type="checkbox"
                       @if ('') checked @endif>
                <label for="faculty-admitted-1" class="form-check-label">Зачислен на специальность</label>
            </div>
            <div class="form-check">
                <input id="decree-1" class="form-check-input" name="decrees[name]" value="Номер приказа" type="checkbox"
                       @if ('') checked @endif>
                <label for="decree-1" class="form-check-label">Номер приказа</label>
            </div>
            <div class="form-check">
                <input id="pickup-docs-1" class="form-check-input" name="enrollment[is_pickup_docs]" value="Отметка о возврате документов" type="checkbox"
                       @if ('') checked @endif>
                <label for="pickup-docs-1" class="form-check-label">Отметка о возврате документов</label>
            </div>
        </div>
    </div>
</div>

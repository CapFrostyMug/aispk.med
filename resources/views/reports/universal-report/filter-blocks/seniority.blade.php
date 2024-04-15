<div class="accordion-item">
    <h2 class="accordion-header" id="headingSeniority">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeniority"
                aria-expanded="false" aria-controls="collapseSeniority">
            Трудовой стаж
        </button>
    </h2>
    <div id="collapseSeniority" class="accordion-collapse collapse" aria-labelledby="headingSeniority">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="place-work-1" class="form-check-input" name="seniority[place_work]" value="Место работы" type="checkbox"
                       @if ('') checked @endif>
                <label for="place-work-1" class="form-check-label">Место работы</label>
            </div>
            <div class="form-check">
                <input id="profession-1" class="form-check-input" name="seniority[profession]" value="Должность, специализация" type="checkbox"
                       @if ('') checked @endif>
                <label for="profession-1" class="form-check-label">Должность, специализация</label>
            </div>
        </div>
    </div>
</div>

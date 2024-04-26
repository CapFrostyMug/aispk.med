<div class="accordion-item">
    <h2 class="accordion-header" id="headingEducation">
        <button class="accordion-button collapsed fw-bold" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseEducation" aria-expanded="false"
                aria-controls="collapseEducation">
            Образование
        </button>
    </h2>
    <div id="collapseEducation" class="accordion-collapse collapse"
         aria-labelledby="headingEducation">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="educationalInstitutionName-1" class="form-check-input"
                       name="educational[ed_institution_name]" value="Наименование учебного заведения" type="checkbox"
                       @if (isset(request()->input('educational')['ed_institution_name'])) checked @endif>
                <label for="educationalInstitutionName-1" class="form-check-label">Наименование учебного
                    заведения</label>
            </div>
            <div class="form-check">
                <input id="educationalInstitutionType-1" class="form-check-input"
                       name="educational_institution_types[name]" value="Тип учебного заведения" type="checkbox"
                       @if (isset(request()->input('educational_institution_types')['name'])) checked @endif>
                <label for="educationalInstitutionType-1" class="form-check-label">Тип учебного заведения</label>
            </div>
            <div class="form-check">
                <input id="educational-doc-type-1" class="form-check-input" name="educational_doc_types[name]"
                       value="Тип документа об образовании" type="checkbox"
                       @if (isset(request()->input('educational_doc_types')['name'])) checked @endif>
                <label for="educational-doc-type-1" class="form-check-label">Тип документа об образовании</label>
            </div>
            <div class="form-check">
                <input id="educational-doc-number-1" class="form-check-input" name="educational[ed_doc_number]"
                       value="Серия и номер документа об образовании" type="checkbox"
                       @if (isset(request()->input('educational')['ed_doc_number'])) checked @endif>
                <label for="educational-doc-number-1" class="form-check-label">Серия и номер документа об
                    образовании</label>
            </div>
            <div class="form-check">
                <input id="issue-date-educational-doc-1" class="form-check-input" name="educational[issue_date]"
                       value="Дата выдачи документа об образовании" type="checkbox"
                       @if (isset(request()->input('educational')['issue_date'])) checked @endif>
                <label for="issue-date-educational-doc-1" class="form-check-label">Дата выдачи документа об
                    образовании</label>
            </div>
            <div class="form-check">
                <input id="avg-rating-1" class="form-check-input" name="educational[avg_rating]" value="Средний балл"
                       type="checkbox"
                       @if (isset(request()->input('educational')['avg_rating'])) checked @endif>
                <label for="avg-rating-1" class="form-check-label">Средний балл</label>
            </div>
            <div class="form-check">
                <input id="admission-testing-1" class="form-check-input" name="educational[admission_testing]"
                       value="Тестирование" type="checkbox"
                       @if (isset(request()->input('educational')['admission_testing'])) checked @endif>
                <label for="admission-testing-1" class="form-check-label">Тестирование</label>
            </div>
            <div class="form-check">
                <input id="excellent-student-1" class="form-check-input" name="educational[is_excellent_student]"
                       value="Окончил обучение с отличием" type="checkbox"
                       @if (isset(request()->input('educational')['is_excellent_student'])) checked @endif>
                <label for="excellent-student-1" class="form-check-label">Окончил обучение с отличием</label>
            </div>
            <div class="form-check">
                <input id="first-profession-1" class="form-check-input" name="educational[is_first_spo]"
                       value="СПО впервые" type="checkbox"
                       @if (isset(request()->input('educational')['is_first_spo'])) checked @endif>
                <label for="first-profession-1" class="form-check-label">СПО впервые</label>
            </div>
        </div>
    </div>
</div>

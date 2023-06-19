<div class="row mb-5 gy-3"> {{--СВЕДЕНИЯ ОБ ОБРАЗОВАНИИ: БЛОК 1--}}
    <div class="col-12">
        <label for="educationalInstitutionName-1" class="form-label">Наименование учебного заведения*</label>
        <input
            id="educationalInstitutionName-1"
            class="form-control"
            name="educationalInstitutionName"
            value="{{ old('educationalInstitutionName') ?? $educational->ed_institution_name ?? '' }}"
            type="text"
            required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-4">
        <label for="educationalInstitutionType-1" class="form-label">Тип учебного заведения*</label>
        <select id="educationalInstitutionType-1" class="form-select" name="educationalInstitutionType" required>
            <option
                value=""
                @if(!old('educationalInstitutionType') || !isset($educational)) selected @endif>Выберите...
            </option>
            @foreach($educationalInstitutionTypes as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('educationalInstitutionType') ||
                    (isset($educational) && ($educational->ed_institution_type_id == $item->id)))
                        selected
                    @endif>
                        {{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
    <div class="col-3">
        <label for="language-1" class="form-label">Иностранный язык*</label>
        <select id="language-1" class="form-select" name="language" required>
            <option value=""
                    @if(!old('language') || !isset($student)) selected @endif>Выберите...
            </option>
            @foreach($languages as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('language') ||
                    (isset($student) && $student->language_id == $item->id))
                        selected
                    @endif>
                        {{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
</div>

<div class="row mb-5 gy-3"> {{--СВЕДЕНИЯ ОБ ОБРАЗОВАНИИ: БЛОК 2--}}
    <div class="col-4">
        <label for="educational-doc-type-1" class="form-label">Тип документа об образовании*</label>
        <select id="educational-doc-type-1" class="form-select" name="educationalDocType" required>
            <option value=""
                    @if(!old('educationalDocType') || !isset($educational)) selected @endif>Выберите...
            </option>
            @foreach($educationalDocTypes as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('educationalDocType') ||
                    (isset($educational) && $educational->ed_doc_type_id == $item->id))
                        selected
                    @endif>
                        {{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
        <div class="form-check">
            <label for="excellent-student-1" class="form-check-label">Окончил обучение с отличием</label>
            <input id="" type="hidden" name="excellentStudent" value="0">
            <input id="excellent-student-1" class="form-check-input" name="excellentStudent" value="1" type="checkbox"
                   @if (old('excellentStudent') == '1' ||
                   (isset($educational) && $educational->is_excellent_student == 1))
                   checked @endif>
        </div>
    </div>
    <div class="col-3">
        <label for="educational-doc-number-1" class="form-label">Серия и номер документа*</label>
        <input id="educational-doc-number-1"
               class="form-control"
               name="educationalDocNumber"
               value="{{ old('educationalDocNumber') ?? $educational->ed_doc_number ?? '' }}"
               type="text"
               required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-2">
        <label for="issue-date-educational-doc-1" class="form-label">Дата выдачи*</label>
        <input id="issue-date-educational-doc-1"
               class="form-control"
               name="issueDateEducationalDoc"
               value="{{ old('issueDateEducationalDoc') ?? $educational->issue_date ?? '' }}"
               type="date" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-2">
        <label for="avg-rating-1" class="form-label">Средний балл*</label>
        <input id="avg-rating-1"
               class="form-control"
               name="avgRating"
               value="{{ old('avgRating') ?? $educational->avg_rating ?? '' }}"
               type="text"
               required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>

    @include('personal-files.form.form-blocks.avgCalculator')

    <div class="col-12">
        <p class="mb-2"><strong>Абитуриент получает СПО впервые?</strong></p>
        <div>
            <div class="form-check form-check-inline">
                <input id="first-profession-true-1"
                       class="form-check-input"
                       name="firstProfession"
                       value="1"
                       type="radio"
                       checked
                       required>
                <label for="first-profession-true-1" class="form-check-label">Да</label>
            </div>
            <div class="form-check form-check-inline">
                <input id="first-profession-false-1"
                       class="form-check-input"
                       name="firstProfession"
                       value="0"
                       type="radio"
                       required
                       @if (old('firstProfession') == '0' ||
                       (isset($educational) && $educational->is_first_spo == 1)) checked @endif>
                <label for="first-profession-false-1" class="form-check-label">Нет</label>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5 gy-3"> {{--СВЕДЕНИЯ ОБ ОБРАЗОВАНИИ: БЛОК 1--}}
    <div class="col-12">
        <label for="educationalInstitutionName-1" class="form-label">Наименование учебного заведения*</label>
        <input
            id="educationalInstitutionName-1"
            class="form-control custom-fn-capslock @error('educationalInstitutionName') is-invalid @enderror"
            name="educationalInstitutionName"
            value="{{ old('educationalInstitutionName') ?? $educational->ed_institution_name ?? '' }}"
            type="text"
            required
            aria-describedby="educationalInstitutionName-1-validation">
        @error('educationalInstitutionName')
        <div id="educationalInstitutionName-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="educationalInstitutionType-1" class="form-label">Тип учебного заведения*</label>
        <select id="educationalInstitutionType-1"
                class="form-select"
                name="educationalInstitutionType"
                required>
            <option
                value=""
                @if(!old('educationalInstitutionType') || !isset($educational)) selected @endif>Выберите...
            </option>
            @if(isset($educationalInstitutionTypes))
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
            @endif
        </select>
    </div>
    <div class="col-3">
        <label for="language-1" class="form-label">Иностранный язык*</label>
        <select id="language-1"
                class="form-select"
                name="language"
                required>
            <option value=""
                    @if(!old('language') || !isset($student)) selected @endif>Выберите...
            </option>
            @if(isset($languages))
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
            @endif
        </select>
    </div>
</div>

<div class="row mb-5 gy-3"> {{--СВЕДЕНИЯ ОБ ОБРАЗОВАНИИ: БЛОК 2--}}
    <div class="col-4">
        <label for="educational-doc-type-1" class="form-label">Тип документа об образовании*</label>
        <select id="educational-doc-type-1"
                class="form-select"
                name="educationalDocType"
                required>
            <option value=""
                    @if(!old('educationalDocType') || !isset($educational)) selected @endif>Выберите...
            </option>
            @if(isset($educationalDocTypes))
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
            @endif
        </select>
        <div class="form-check mt-1">
            <label for="excellent-student-1" class="form-check-label fw-bold">Окончил обучение с отличием</label>
            <input id="" type="hidden" name="excellentStudent" value="0">
            <input id="excellent-student-1" class="form-check-input" name="excellentStudent" value="1" type="checkbox"
                   @if (old('excellentStudent') === '1' || (isset($educational) && $educational->is_excellent_student === 1)) checked @endif>
        </div>
    </div>

    <div class="col-3">
        <label for="educational-doc-number-1" class="form-label">Серия и номер документа*</label>
        <input id="educational-doc-number-1"
               class="form-control @error('educationalDocNumber') is-invalid @enderror"
               name="educationalDocNumber"
               value="{{ old('educationalDocNumber') ?? $educational->ed_doc_number ?? '' }}"
               type="text"
               required
               aria-describedby="educational-doc-number-1-validation">
        @error('educationalDocNumber')
        <div id="educational-doc-number-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-2">
        <label for="issue-date-educational-doc-1" class="form-label">Дата выдачи*</label>
        <input id="issue-date-educational-doc-1"
               class="form-control @error('issueDateEducationalDoc') is-invalid @enderror"
               name="issueDateEducationalDoc"
               value="{{ old('issueDateEducationalDoc') ?? $educational->issue_date ?? '' }}"
               type="date"
               min="1923-01-01" max="2023-01-01"
               required
               aria-describedby="issue-date-educational-doc-1-validation">
        @error('issueDateEducationalDoc')
        <div id="issue-date-educational-doc-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    @include('personal-files.form.blocks.avg-calculator')
    <div class="col-2 d-flex flex-column justify-content-end pb-3">
        <label for="avg-rating-1" class="form-label">Средний балл*</label>
        <input id="avg-rating-1"
               class="form-control @error('avgRating') is-invalid @enderror"
               name="avgRating"
               value="{{ old('avgRating') ?? $educational->avg_rating ?? '' }}"
               type="text"
               required
               aria-describedby="avg-rating-1-validation">
        @error('avgRating')
        <div id="avg-rating-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-2 d-flex flex-column justify-content-end pb-3">
        <label for="admission-testing-1" class="form-label">Тестирование</label>
        <input id="admission-testing-1"
               class="form-control @error('admissionTesting') is-invalid @enderror"
               name="admissionTesting"
               value="{{ old('admissionTesting') ?? $educational->admission_testing ?? '' }}"
               type="text"
               aria-describedby="admission-testing-1-validation">
        @error('admissionTesting')
        <div id="admission-testing-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-12">
        <p class="fw-bold mb-2">Абитуриент получает СПО впервые?</p>
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
                       @if (old('firstProfession') === '0' || isset($educational) && $educational->is_first_spo === 0) checked @endif>
                <label for="first-profession-false-1" class="form-check-label">Нет</label>
            </div>
        </div>
    </div>
</div>

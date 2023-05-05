<div class="row mb-5 gy-3"> {{--СВЕДЕНИЯ ОБ ОБРАЗОВАНИИ: БЛОК 1--}}
    <div class="col-12">
        <label for="educationalInstitutionName-1" class="form-label">Наименование учебного заведения*</label>
        <input
            id="educationalInstitutionName-1"
            class="form-control"
            name="educationalInstitutionName"
            value="{{ old('educationalInstitutionName') }}"
            type="text"
            required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-6">
        <label for="educationalInstitutionType-1" class="form-label">Тип учебного заведения*</label>
        <select id="educationalInstitutionType-1" class="form-select" name="educationalInstitutionType" required>
            <option value=""
                    @if(!old('educationalInstitutionType')) selected @endif
            >Выберите...
            </option>
            @foreach($educationalInstitutionTypes as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('educationalInstitutionType')) selected @endif
                >{{ $item->name }}
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
                    @if(!old('language')) selected @endif
            >Выберите...
            </option>
            @foreach($languages as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('language')) selected @endif
                >{{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
</div>

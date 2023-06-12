<div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 1 --}}
    <div class="col-4">
        <label for="lastName-1" class="form-label">Фамилия*</label>
        <input id="lastName-1" class="form-control" name="lastName" value="{{ old('lastName') }}"
               type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-4">
        <label for="firstName-1" class="form-label">Имя*</label>
        <input id="firstName-1" class="form-control" name="firstName" value="{{ old('firstName') }}"
               type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-4">
        <label for="patronymic-1" class="form-label">Отчество</label>
        <input id="patronymic-1" class="form-control" name="patronymic" value="{{ old('patronymic') }}"
               type="text">
    </div>
    <div class="col-4">
        <p>Пол</p>
        <div class="form-check form-check-inline">
            <input id="genderMale-1" class="form-check-input" name="gender" value="male" type="radio"
                   checked>
            <label for="genderMale-1" class="form-check-label">Мужской</label>
        </div>
        <div class="form-check form-check-inline">
            <input id="genderFemale-1" class="form-check-input" name="gender" value="female" type="radio"
                   @if (old('gender') == 'female') checked @endif>
            <label for="genderFemale-1" class="form-check-label">Женский</label>
        </div>
    </div>
    <div class="col-2">
        <label for="birthday-1" class="form-label">Дата рождения*</label>
        <input id="birthday-1" class="form-control" name="birthday" value="{{ old('birthday') }}"
               type="date" required>
        <div class="invalid-feedback">
            Пожалуйста, выберите дату.
        </div>
    </div>
    <div class="col-4 offset-2">
        <label for="nationality-1" class="form-label">Гражданство*</label>
        <select id="nationality-1" class="form-select" name="nationality" required>
            <option value=""
                    @if(!old('nationality')) selected @endif
            >Выберите...
            </option>
            @foreach($nationality as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('nationality')) selected @endif
                >{{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
    <div class="col-12">
        <label for="birthplace-1" class="form-label">Место рождения*</label>
        <input id="birthplace-1" class="form-control" name="birthplace" value="{{ old('birthplace') }}"
               type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
</div>

<div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 2 --}}
    <div class="col-4">
        <label for="passport-number-1" class="form-label">Серия и номер паспорта*</label>
        <input id="passport-number-1" class="form-control" name="passportNumber"
               value="{{ old('passportNumber') }}" type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-2">
        <label for="issue-date-passport-1" class="form-label">Дата выдачи*</label>
        <input id="issue-date-passport-1" class="form-control" name="issueDatePassport" value="{{ old('issueDatePassport') }}"
               type="date" required>
        <div class="invalid-feedback">
            Пожалуйста, выберите дату.
        </div>
    </div>
    <div class="col-12">
        <label for="issue-by-1" class="form-label">Паспорт выдан*</label>
        <input id="issue-by-1" class="form-control" name="issueBy" value="{{ old('issueBy') }}"
               type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
</div>

<div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 3 --}}
    <div class="col-12">
        <label for="address-registered-1" class="form-label">Адрес по прописке*</label>
        <input id="address-registered-1" class="form-control" name="addressRegistered"
               value="{{ old('addressRegistered') }}" type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
    <div class="col-12">
        <label for="address-residential-1" class="form-label">Адрес проживания*</label>
        <input id="address-residential-1" class="form-control" name="addressResidential"
               value="{{ old('addressResidential') }}" type="text" required>
        <div class="invalid-feedback">
            Пожалуйста, заполните поле.
        </div>
    </div>
</div>

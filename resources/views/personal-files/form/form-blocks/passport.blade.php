<div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 1 --}}
    <div class="col-4">
        <label for="lastName-1" class="form-label">Фамилия*</label>
        <input id="lastName-1"
               class="form-control custom-capslock-none @error('surname') is-invalid @enderror"
               name="surname"
               value="{{ old('surname') ?? $student->surname ?? '' }}"
               type="text"
               required
               aria-describedby="lastName-1-validation">
        @error('surname')
        <div id="lastName-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="firstName-1" class="form-label">Имя*</label>
        <input id="firstName-1"
               class="form-control custom-capslock-none @error('name') is-invalid @enderror"
               name="name"
               value="{{ old('name') ?? $student->name ?? '' }}"
               type="text"
               required
               aria-describedby="firstName-1-validation">
        @error('name')
        <div id="firstName-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="patronymic-1" class="form-label">Отчество</label>
        <input id="patronymic-1"
               class="form-control custom-capslock-none @error('patronymic') is-invalid @enderror"
               name="patronymic"
               value="{{ old('patronymic') ?? $student->patronymic ?? '' }}"
               type="text"
               aria-describedby="patronymic-1-validation">
        @error('patronymic')
        <div id="patronymic-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <p>Пол</p>
        <div class="form-check form-check-inline">
            <input id="genderMale-1" class="form-check-input" name="gender" value="male" type="radio"
                   checked>
            <label for="genderMale-1" class="form-check-label">Мужской</label>
        </div>
        <div class="form-check form-check-inline">
            <input id="genderFemale-1"
                   class="form-check-input"
                   name="gender"
                   value="female"
                   type="radio"
                   @if (old('gender') === 'female' || (isset($passport) && ($passport->gender) === 'female')) checked @endif>
            <label for="genderFemale-1" class="form-check-label">Женский</label>
        </div>
    </div>
    <div class="col-2">
        <label for="birthday-1" class="form-label">Дата рождения*</label>
        <input id="birthday-1"
               class="form-control @error('birthday') is-invalid @enderror"
               name="birthday"
               value="{{ old('birthday') ?? $passport->birthday ?? '' }}"
               type="date"
               min="1923-01-01" max="2023-01-01"
               required
               aria-describedby="birthday-1-validation">
        @error('birthday')
        <div id="birthday-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4 offset-2">
        <label for="nationality-1" class="form-label">Гражданство*</label>
        <select id="nationality-1" class="form-select" name="nationality" required>
            <option
                value=""
                @if(!old('nationality') || !isset($passport)) selected @endif>Выберите...
            </option>
            @foreach($nationality as $item)
                <option
                    value="{{ $item->id }}"
                    @if($item->id == old('nationality') ||
                    (isset($passport) && ($passport->nationality_id) == $item->id))
                    selected
                    @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="birthplace-1" class="form-label">Место рождения*</label>
        <input id="birthplace-1"
               class="form-control custom-capslock-none @error('birthplace') is-invalid @enderror"
               name="birthplace"
               value="{{ old('birthplace') ?? $passport->birthplace ?? '' }}"
               type="text"
               required
               aria-describedby="birthplace-validation">
        @error('birthplace')
        <div id="birthplace-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 2 --}}
    <div class="col-4">
        <label for="passport-number-1" class="form-label">Серия и номер паспорта*</label>
        <input id="passport-number-1"
               class="form-control @error('passportNumber') is-invalid @enderror"
               name="passportNumber"
               value="{{ old('passportNumber') ?? $passport->number ?? '' }}"
               type="text"
               placeholder="Т-АТZ0825000"
               required
               aria-describedby="passport-number-1-validation">
        @error('passportNumber')
        <div id="passport-number-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-2">
        <label for="issue-date-passport-1" class="form-label">Дата выдачи*</label>
        <input id="issue-date-passport-1"
               class="form-control @error('issueDatePassport') is-invalid @enderror"
               name="issueDatePassport"
               value="{{ old('issueDatePassport') ?? $passport->issue_date ?? '' }}"
               type="date"
               min="1923-01-01" max="2023-01-01"
               required
               aria-describedby="issue-date-passport-1-validation">
        @error('issueDatePassport')
        <div id="issue-date-passport-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-12">
        <label for="issue-by-1" class="form-label">Паспорт выдан*</label>
        <input id="issue-by-1"
               class="form-control custom-capslock-none @error('issueBy') is-invalid @enderror"
               name="issueBy"
               value="{{ old('issueBy') ?? $passport->issue_by ?? '' }}"
               type="text"
               required
               aria-describedby="issue-by-1-validation">
        @error('issueBy')
        <div id="issue-by-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row mb-5 gy-3"> {{-- ПАСПОРТНЫЕ ДАННЫЕ: БЛОК 3 --}}
    <div class="col-12">
        <label for="address-registered-1" class="form-label">Адрес по прописке*</label>
        <input id="address-registered-1"
               class="form-control custom-capslock-none @error('addressRegistered') is-invalid @enderror"
               name="addressRegistered"
               value="{{ old('addressRegistered') ?? $passport->address_registered ?? '' }}"
               type="text"
               required
               aria-describedby="address-registered-1-validation">
        @error('addressRegistered')
        <div id="address-registered-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-12">
        <label for="address-residential-1" class="form-label">Адрес проживания*</label>
        <input id="address-residential-1"
               class="form-control custom-capslock-none @error('addressResidential') is-invalid @enderror"
               name="addressResidential"
               value="{{ old('addressResidential') ?? $passport->address_residential ?? '' }}"
               type="text"
               required
               aria-describedby="address-residential-1-validation">
        @error('addressResidential')
        <div id="address-residential-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

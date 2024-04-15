<div class="accordion-item">
    <h2 class="accordion-header" id="headingPassport">
        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePassport"
                aria-expanded="true" aria-controls="collapsePassport">
            Паспортные данные
        </button>
    </h2>
    <div id="collapsePassport" class="accordion-collapse collapse show" aria-labelledby="headingPassport">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="surname-1" class="form-check-input" name="students[surname]" value="Фамилия" type="checkbox"
                       @if ('') checked @endif>
                <label for="surname-1" class="form-check-label">Фамилия</label>
            </div>
            <div class="form-check">
                <input id="name-1" class="form-check-input" name="students[name]" value="Имя" type="checkbox"
                       @if ('') checked @endif>
                <label for="name-1" class="form-check-label">Имя</label>
            </div>
            <div class="form-check">
                <input id="patronymic-1" class="form-check-input" name="students[patronymic]" value="Отчество" type="checkbox"
                       @if ('') checked @endif>
                <label for="patronymic-1" class="form-check-label">Отчество</label>
            </div>
            <div class="form-check">
                <input id="gender-1" class="form-check-input" name="passports[gender]" value="Пол" type="checkbox"
                       @if ('') checked @endif>
                <label for="gender-1" class="form-check-label">Пол</label>
            </div>
            <div class="form-check">
                <input id="birthday-1" class="form-check-input" name="passports[birthday]" value="Дата рождения" type="checkbox"
                       @if ('') checked @endif>
                <label for="birthday-1" class="form-check-label">Дата рождения</label>
            </div>
            <div class="form-check">
                <input id="nationality-1" class="form-check-input" name="nationality[name]" value="Гражданство" type="checkbox"
                       @if ('') checked @endif>
                <label for="nationality-1" class="form-check-label">Гражданство</label>
            </div>
            <div class="form-check">
                <input id="birthplace-1" class="form-check-input" name="passports[birthplace]" value="Место рождения" type="checkbox"
                       @if ('') checked @endif>
                <label for="birthplace-1" class="form-check-label">Место рождения</label>
            </div>
            <div class="form-check">
                <input id="passport-number-1" class="form-check-input" name="passports[number]" value="Серия и номер паспорта" type="checkbox"
                       @if ('') checked @endif>
                <label for="passport-number-1" class="form-check-label">Серия и номер паспорта</label>
            </div>
            <div class="form-check">
                <input id="issue-date-passport-1" class="form-check-input" name="passports[issue_date]" value="Дата выдачи паспорта" type="checkbox"
                       @if ('') checked @endif>
                <label for="issue-date-passport-1" class="form-check-label">Дата выдачи паспорта</label>
            </div>
            <div class="form-check">
                <input id="issue-by-1" class="form-check-input" name="passports[issue_by]" value="Паспорт выдан" type="checkbox"
                       @if ('') checked @endif>
                <label for="issue-by-1" class="form-check-label">Паспорт выдан</label>
            </div>
            <div class="form-check">
                <input id="address-registered-1" class="form-check-input" name="passports[address_registered]" value="Адрес по прописке" type="checkbox"
                       @if ('') checked @endif>
                <label for="address-registered-1" class="form-check-label">Адрес по прописке</label>
            </div>
            <div class="form-check">
                <input id="address-residential-1" class="form-check-input" name="passports[address_residential]" value="Адрес проживания" type="checkbox"
                       @if ('') checked @endif>
                <label for="address-residential-1" class="form-check-label">Адрес проживания</label>
            </div>
        </div>
    </div>
</div>

<div> {{-- КОНТАКТНАЯ ИНФОРМАЦИЯ --}}
    <div class="row mb-5 gy-3">
        <div class="col-3">
            <label for="phone-1" class="form-label">Телефон</label>
            <input id="phone-1"
                   class="form-control"
                   name="phone"
                   value="{{ old('phone') }}"
                   type="tel"
                   placeholder="+7 (999) 999-99-99">
            <div class="invalid-feedback">
                Пожалуйста, заполните поле.
            </div>
        </div>
        <div class="col-5 offset-1">
            <label for="email-1" class="form-label">Электронная почта</label>
            <input
                id="email-1"
                class="form-control"
                name="email"
                value="{{ old('email') }}"
                type="email">
            <div class="invalid-feedback">
                Пожалуйста, заполните поле.
            </div>
        </div>
    </div>
</div>

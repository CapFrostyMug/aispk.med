<div class="row mb-5 gy-3"> {{-- СВЕДЕНИЯ О ТРУДОВОМ СТАЖЕ --}}
    <div class="col-12">
        <label for="place-work-1" class="form-label">Место работы</label>
        <input id="place-work-1"
               class="form-control custom-capslock-none @error('placeWork') is-invalid @enderror"
               name="placeWork"
               value="{{ old('placeWork') ?? $seniority->place_work ?? '' }}"
               type="text"
               aria-describedby="place-work-1-validation">
        @error('placeWork')
        <div id="place-work-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-7">
        <label for="profession-1" class="form-label">Должность, специализация</label>
        <input id="profession-1"
               class="form-control custom-capslock-none @error('profession') is-invalid @enderror"
               name="profession"
               value="{{ old('profession') ?? $seniority->profession ?? '' }}"
               type="text"
               aria-describedby="profession-1-validation">
        @error('profession')
        <div id="profession-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-2 offset-1">
        <label for="seniority-years-1" class="form-label">Стаж, лет</label>
        <input id="seniority-years-1"
               class="form-control @error('seniorityYears') is-invalid @enderror"
               name="seniorityYears"
               value="{{ old('seniorityYears') ?? $seniority->years ?? '' }}"
               type="number"
               aria-describedby="seniority-years-1-validation"
               min="0"
               max="100">
        @error('seniorityYears')
        <div id="seniority-years-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-2">
        <label for="seniority-months-1" class="form-label">Стаж, месяцев</label>
        <input id="seniority-months-1"
               class="form-control @error('seniorityMonths') is-invalid @enderror"
               name="seniorityMonths"
               value="{{ old('seniorityMonths') ?? $seniority->months ?? '' }}"
               type="number"
               aria-describedby="seniority-months-1-validation"
               min="0"
               max="12">
        @error('seniorityMonths')
        <div id="seniority-months-1-validation" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

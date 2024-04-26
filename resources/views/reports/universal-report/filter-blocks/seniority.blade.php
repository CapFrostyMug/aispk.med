<div class="accordion-item">
    <h2 class="accordion-header" id="headingSeniority">
        <button class="accordion-button @if(!request()->input('seniority')) collapsed @endif fw-bold" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseSeniority"
                aria-expanded="{{ request()->input('seniority') ? 'true' : 'false' }}" aria-controls="collapseSeniority">
            Трудовой стаж
        </button>
    </h2>
    <div id="collapseSeniority" class="accordion-collapse collapse @if(request()->input('seniority')) show @endif" aria-labelledby="headingSeniority">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="place-work-1" class="form-check-input" name="seniority[place_work]" value="Место работы"
                       type="checkbox"
                       @if (isset(request()->input('seniority')['place_work'])) checked @endif>
                <label for="place-work-1" class="form-check-label">Место работы</label>
            </div>
            <div class="form-check">
                <input id="profession-1" class="form-check-input" name="seniority[profession]"
                       value="Должность, специализация" type="checkbox"
                       @if (isset(request()->input('seniority')['profession'])) checked @endif>
                <label for="profession-1" class="form-check-label">Должность, специализация</label>
            </div>
        </div>
    </div>
</div>

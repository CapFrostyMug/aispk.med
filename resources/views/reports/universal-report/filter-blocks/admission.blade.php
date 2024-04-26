<div class="accordion-item">
    <h2 class="accordion-header" id="headingAdmission">
        <button class="accordion-button collapsed fw-bold" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseAdmission"
                aria-expanded="false" aria-controls="collapseAdmission">
            Поступление
        </button>
    </h2>
    <div id="collapseAdmission" class="accordion-collapse collapse"
         aria-labelledby="headingAdmission">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="profile-number-1"
                       class="form-check-input"
                       name="students[id]"
                       value="№"
                       type="checkbox"
                       @if (isset(request()->input('students')['id'])) checked @endif>
                <label for="profile-number-1" class="form-check-label">Номер дела</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                <label class="form-check-label" for="flexCheckDefault">
                    Специальности/Финансирование
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                <label class="form-check-label" for="flexCheckDefault">
                    Специальность с оригиналами документов
                </label>
            </div>
            <div class="form-check">
                <input id="submission-date-1"
                       class="form-check-input"
                       name="students[created_at]"
                       value="Дата подачи документов"
                       type="checkbox"
                       @if (isset(request()->input('students')['created_at'])) checked @endif>
                <label for="submission-date-1" class="form-check-label">Дата подачи документов</label>
            </div>
        </div>
    </div>
</div>

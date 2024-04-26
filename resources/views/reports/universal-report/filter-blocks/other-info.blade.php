<div class="accordion-item">
    <h2 class="accordion-header" id="headingOtherInfo">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOtherInfo"
                aria-expanded="false" aria-controls="collapseOtherInfo">
            Дополнительно
        </button>
    </h2>
    <div id="collapseOtherInfo" class="accordion-collapse collapse" aria-labelledby="headingOtherInfo">
        <div class="accordion-body p-3">
            <div class="form-check">
                <input id="special-conditions-1" class="form-check-input" name="student_special_circumstance[status][0]"
                       value="1" type="checkbox"
                       @if ('') checked @endif disabled>
                <label for="special-conditions-1" class="form-check-label">Потребность в создании
                    специальных условий</label>
            </div>
            <div class="form-check">
                <input id="disability-1" class="form-check-input" name="student_special_circumstance[status][1]"
                       value="2" type="checkbox"
                       @if ('') checked @endif disabled>
                <label for="disability-1" class="form-check-label">Наличие инвалидности</label>
            </div>
            <div class="form-check">
                <input id="hostel-1" class="form-check-input" name="student_special_circumstance[status][2]" value="3"
                       type="checkbox"
                       @if ('') checked @endif disabled>
                <label for="hostel-1" class="form-check-label">Потребность в общежитии</label>
            </div>
            <div class="form-check">
                <input id="orphan-1" class="form-check-input" name="student_special_circumstance[status][3]" value="5"
                       type="checkbox"
                       @if ('') checked @endif disabled>
                <label for="orphan-1" class="form-check-label">Является сиротой</label>
            </div>
            <div class="form-check">
                <input id="about-me-1" class="form-check-input" name="students[about_me]" value="О себе" type="checkbox"
                       @if (isset(request()->input('students')['about_me'])) checked @endif>
                <label for="about-me-1" class="form-check-label">О себе</label>
            </div>
        </div>
    </div>
</div>

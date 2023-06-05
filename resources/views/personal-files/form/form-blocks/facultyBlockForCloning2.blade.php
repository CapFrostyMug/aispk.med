<div class="row mb-4 faculty-block-child">

    <div class="col-6">
        <label for="faculty-1" class="form-label">Наименование специальности*</label>
        <select id="faculty-1"
                class="form-select"
                name="@if (isset($data)) data[{{ $blockName }}][faculty_id] @else data[block1][faculty_id] @endif"
                required>
            <option value=""
                    @if(isset($data) && !$blockContent['faculty_id']) selected @endif
            >Выберите...
            </option>
            @foreach($faculties as $item)
                <option
                    value="{{ $item->id }}"
                    @if(isset($data) && $item->id == $blockContent['faculty_id']) selected @endif
                >{{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
        <div class="form-check">
            <input id="original-docs-1"
                   type="hidden"
                   name="@if (isset($data)) data[{{ $blockName }}][is_original_docs] @else data[block1][is_original_docs] @endif"
                   value="0">
            <input id="original-docs-1"
                   class="form-check-input"
                   name="@if (isset($data)) data[{{ $blockName }}][is_original_docs] @else data[block1][is_original_docs] @endif"
                   value="1"
                   type="checkbox"
                   @if (isset($data) && $blockContent['is_original_docs'] == '1') checked @endif>
            <label for="original-docs-1" class="form-check-label">Оригиналы документов</label>
        </div>
    </div>

    <div class="col-3">
        <label for="financing-1" class="form-label">Финансирование*</label>
        <select id="financing-1"
                class="form-select"
                name="@if (isset($data)) data[{{ $blockName }}][financing_type_id] @else data[block1][financing_type_id] @endif"
                required>
            <option value=""
                    @if(isset($data) && !$blockContent['financing_type_id']) selected @endif
            >Выберите...
            </option>
            @foreach($financing as $item)
                <option
                    value="{{ $item->id }}"
                    @if(isset($data) && $item->id == $blockContent['financing_type_id']) selected @endif
                >{{ $item->name }}
                </option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Пожалуйста, выберите вариант.
        </div>
    </div>
    <div class="col-1 d-flex justify-content-center align-items-center">
        <span class="remove-block" title="Удалить блок">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF0000" class="bi bi-trash3-fill"
                 viewBox="0 0 16 16">
            <path
                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
        </svg>
        </span>
    </div>
</div>

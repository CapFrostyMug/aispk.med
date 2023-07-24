<div class="row mb-4 custom-faculty-block-child">
    <div class="col-6">
        <label for="@if (isset($facultiesBlocks) && isset($blockName))
                        faculty_{{ $blockName }}
                    @else
                        faculty_block_1
                    @endif"
               class="form-label">Наименование специальности*
        </label>

        <select id="@if (isset($facultiesBlocks) && isset($blockName))
                        faculty_{{ $blockName }}
                    @else
                        faculty_block_1
                    @endif"
                class="form-select"
                name="@if (isset($facultiesBlocks) && isset($blockName))
                        data[{{ $blockName }}][faculty_id]
                      @else
                        data[block_1][faculty_id]
                      @endif" required>

            <option value=""
                    @if(isset($facultiesBlocks) && isset($blockContent) && !$blockContent['faculty_id']) selected @endif>Выберите...
            </option>

            @foreach($faculties as $item)
                <option value="{{ $item->id }}"
                    @if(isset($facultiesBlocks) && isset($blockContent) && ($item->id == $blockContent['faculty_id'])) selected @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <div class="form-check">
            <input id="@if (isset($facultiesBlocks) && isset($blockName))
                            original_docs_{{ $blockName }}
                        @else
                            original_docs_block_1
                        @endif"
                   type="hidden"
                   name="@if (isset($facultiesBlocks) && isset($blockName))
                            data[{{ $blockName }}][is_original_docs]
                         @else
                            data[block_1][is_original_docs]
                         @endif"
                   value="0">

            <input id="@if (isset($facultiesBlocks) && isset($blockName))
                            original_docs_{{ $blockName }}
                        @else
                            original_docs_block_1
                        @endif"
                   class="form-check-input custom-input-original-docs"
                   name="@if (isset($facultiesBlocks) && isset($blockName))
                            data[{{ $blockName }}][is_original_docs]
                         @else
                            data[block_1][is_original_docs]
                         @endif"
                   value="1"
                   type="checkbox"
                   @if (isset($facultiesBlocks) && isset($blockContent) && ($blockContent['is_original_docs'] === 1)) checked @endif>

            <label for="@if (isset($facultiesBlocks) && isset($blockName))
                            original_docs_{{ $blockName }}
                        @else
                            original_docs_block_1
                        @endif"
                   class="form-check-label">Оригиналы документов
            </label>
        </div>
    </div>

    <div class="col-3">
        <label for="@if (isset($facultiesBlocks) && isset($blockName))
                        financing_{{ $blockName }}
                    @else
                        financing_block_1
                    @endif"
               class="form-label">Финансирование*
        </label>

        <select id="@if (isset($facultiesBlocks) && isset($blockName))
                        financing_{{ $blockName }}
                    @else
                        financing_block_1
                    @endif"
                class="form-select"
                name="@if (isset($facultiesBlocks) && isset($blockName))
                        data[{{ $blockName }}][financing_type_id]
                      @else
                        data[block_1][financing_type_id]
                      @endif" required>

            <option value=""
                    @if(isset($facultiesBlocks) && isset($blockContent) && !$blockContent['financing_type_id']) selected @endif>Выберите...
            </option>

            @foreach($financing as $item)
                <option value="{{ $item->id }}"
                    @if(isset($facultiesBlocks) && isset($blockContent) && ($item->id == $blockContent['financing_type_id'])) selected @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-1
                d-flex
                justify-content-center
                align-items-center
                custom-remove-block">
        <span class="custom-delete-cart" title="Удалить строку">
            @include('icons.trashFacultyBlock')
        </span>
    </div>
</div>

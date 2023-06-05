@php
    if (@old('data')) $data = @old('data');
@endphp

@if(isset($data))
    @dump($data)
@endif

<div class="row gy-3 faculty-block-parent">
    @if(old('data'))
        @foreach(old('data') as $blockName => $blockContent)
            <div class="row mb-4 faculty-block-child">
                <div class="col-6">
                    <label for="faculty-1" class="form-label">Наименование специальности*</label>
                    <select id="faculty-1" class="form-select" name="data[{{ $blockName }}][faculty]"
                            required>
                        <option value=""
                                @if(!$blockContent['faculty']) selected @endif
                        >Выберите...
                        </option>
                        @foreach($faculties as $item)
                            <option
                                value="{{ $item->id }}"
                                @if($item->id == $blockContent['faculty']) selected @endif
                            >{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите вариант.
                    </div>
                    <div class="form-check">
                        <input id="original-docs-1" type="hidden" name="data[{{ $blockName }}][originalDocs]"
                               value="0">
                        <input id="original-docs-1" class="form-check-input parent-checkbox"
                               name="data[{{ $blockName }}][originalDocs]"
                               value="1" type="checkbox"
                               @if ($blockContent['originalDocs'] == '1') checked @endif>
                        <label for="original-docs-1" class="form-check-label">Оригиналы документов</label>
                    </div>
                </div>

                <div class="col-3">
                    <label for="financing-1" class="form-label">Финансирование*</label>
                    <select id="financing-1" class="form-select" name="data[{{ $blockName }}][financing]"
                            required>
                        <option value=""
                                @if(!$blockContent['financing']) selected @endif
                        >Выберите...
                        </option>
                        @foreach($financing as $item)
                            <option
                                value="{{ $item->id }}"
                                @if($item->id == $blockContent['financing']) selected @endif
                            >{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Пожалуйста, выберите вариант.
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row mb-4 faculty-block-child">
            <div class="col-6">
                <label for="faculty-1" class="form-label">Наименование специальности*</label>
                <select id="faculty-1" class="form-select" name="data[block1][faculty]" required>
                    <option value=""
                            @if(!old('faculty')) selected @endif
                    >Выберите...
                    </option>
                    @foreach($faculties as $item)
                        <option
                            value="{{ $item->id }}"
                            @if($item->id == old('faculty')) selected @endif
                        >{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Пожалуйста, выберите вариант.
                </div>
                <div class="form-check">
                    <input id="original-docs-1" type="hidden" name="data[block1][originalDocs]" value="0">
                    <input id="original-docs-1" class="form-check-input" name="data[block1][originalDocs]" value="1"
                           type="checkbox"
                           @if (old('originalDocs') == '1') checked @endif>
                    <label for="original-docs-1" class="form-check-label">Оригиналы документов</label>
                </div>
            </div>
            <div class="col-3">
                <label for="financing-1" class="form-label">Финансирование*</label>
                <select id="financing-1" class="form-select" name="data[block1][financing]" required>
                    <option value=""
                            @if(!old('financing')) selected @endif
                    >Выберите...
                    </option>
                    @foreach($financing as $item)
                        <option
                            value="{{ $item->id }}"
                            @if($item->id == old('financing')) selected @endif
                        >{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Пожалуйста, выберите вариант.
                </div>
            </div>
        </div>
    @endif
</div>

<div class="row mb-5 gy-3">
    <div class="col-12">
        <button type="button" class="btn btn-link text-decoration-none p-0 add-faculty">
            <strong>Добавить ещё специальность...</strong>
        </button>
    </div>
</div>

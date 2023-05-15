<div class="row mb-5 gy-3">

    <div class="col-6">
        <label for="faculty-1" class="form-label">Наименование специальности*</label>
        <select id="faculty-1" class="form-select" name="faculty" required>
            <option value=""
                    @if(!old('faculty')) selected @endif
            >Выберите...
            </option>
            @foreach($faculty as $item)
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
            <input id="original-docs-1" class="form-check-input" name="originalDocs" value="1" type="checkbox">
            <label for="original-docs-1" class="form-check-label">Оригиналы документов</label>
        </div>
    </div>

    <div class="col-3">
        <label for="financing-1" class="form-label">Финансирование*</label>
        <select id="financing-1" class="form-select" name="financing" required>
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

    <a href="#" class="link-primary text-decoration-none"><strong>Добавить специальность...</strong></a>

</div>

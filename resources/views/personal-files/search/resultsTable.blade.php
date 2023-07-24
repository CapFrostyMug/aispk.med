@if(!empty($student))
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
            <tr class="custom-results-table-bg-color">
                <th scope="col" class="col-1 text-center">№</th>
                <th scope="col" class="col-3 text-center">Фамилия</th>
                <th scope="col" class="col-3 text-center">Имя</th>
                <th scope="col" class="col-3 text-center">Отчество</th>
                <th scope="col" class="col-2 text-center">Управление</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="text-center">{{ $student->id }}</th>
                <td class="text-center">{{ $student->surname }}</td>
                <td class="text-center">{{ $student->name }}</td>
                <td class="text-center">{{ $student->patronymic }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('personal-file.management.show', $student->id) }}" title="Просмотр">
                        @include('icons.show')
                    </a>
                    <a href="{{ route('personal-file.management.edit', $student->id) }}" title="Редактировать">
                        @include('icons.edit')
                    </a>
                    <a href="{{ route('personal-file.management.print', $student->id) }}" title="Печать">
                        @include('icons.print')
                    </a>
                    <a href="{{ route('personal-file.management.destroy', $student->id) }}" title="Удалить">
                        @include('icons.trashFacultyBlock')
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@elseif(isset($student) || !empty($errors->all()))
    <div>
        <p class="pt-5 fs-5 text-danger">Ничего не найдено</p>
    </div>
@endif

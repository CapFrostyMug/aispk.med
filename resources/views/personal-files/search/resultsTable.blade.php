@if(!empty($student))
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
            <tr class="custom-results-table-bg-color">
                <th scope="col" class="col-2 text-center">Номер дела</th>
                <th scope="col" class="col-3 text-center">Фамилия</th>
                <th scope="col" class="col-3 text-center">Имя</th>
                <th scope="col" class="col-3 text-center">Отчество</th>
                <th scope="col" class="col-3 text-center">Управление</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" class="col-2 text-center">{{ $student->id }}</th>
                <td class="col-3 text-center">{{ $student->surname }}</td>
                <td class="col-3 text-center">{{ $student->name }}</td>
                <td class="col-3 text-center">{{ $student->patronymic }}</td>
                <td class="col-3 text-center">
                    <a href="{{ route('personal-file.edit-file', $student->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
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

<td class="text-center align-content-center">{{ $student->educational->ed_institution_name }}</td>
<td class="text-center align-content-center">{{ $student->educational->educationalInstitutionType->name }}</td>
<td class="text-center align-content-center">{{ $student->educational->educationalDocType->name }}</td>
<td class="text-center align-content-center">{{ $student->educational->ed_doc_number }}</td>
<td class="text-center align-content-center">{{ date('d.m.Y', strtotime($student->educational->issue_date)) }}</td>
<td class="text-center align-content-center">{{ $student->educational->avg_rating }}</td>
<td class="text-center align-content-center">{{ $student->educational->is_excellent_student ? 'Да' : 'Нет' }}</td>
<td class="text-center align-content-center">{{ $student->educational->is_first_spo ? 'Да' : 'Нет' }}</td>

<td class="text-center align-content-center">{!! $student->phone ?? '&mdash;' !!}</td>
<td class="text-center align-content-center">{{ $student->educational->is_first_spo ? 'Да' : 'Нет' }}</td>
<td class="text-center align-content-center">{{ $student->specialCircumstances[3]->pivot->status ? 'Да' : 'Нет' }}</td>
<td class="text-center align-content-center">{{ $student->specialCircumstances[4]->pivot->status ? 'Да' : 'Нет' }}</td>
<td class="text-center align-content-center">{{ date('Y', strtotime($student->educational->issue_date)) }}</td>
<td class="text-center align-content-center">{{ date('d.m.Y', strtotime($student->educational->issue_date)) }}</td>
<td class="text-center align-content-center">{{ $student->educational->ed_doc_number }}</td>
<td class="text-center align-content-center">{!! $student->enrollment->decree->name ?? '&mdash;' !!}</td>
<td class="text-center align-content-center">{{ date('d.m.Y', strtotime($student->created_at)) }}</td>

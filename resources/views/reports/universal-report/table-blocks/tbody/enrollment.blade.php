<td class="text-center align-content-center custom-st-min-width-325">{!! $student->enrollment->faculty->name ?? '&mdash;' !!}</td>
<td class="text-center align-content-center custom-st-min-width-125">{!! $student->enrollment->decree->name ?? '&mdash;' !!}</td>
<td class="text-center align-content-center custom-st-min-width-175">{{ $student->enrollment->is_pickup_docs ? 'Да' : 'Нет' }}</td>

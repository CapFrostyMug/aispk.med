@php
    $faculties = '';

    foreach ($student->faculties as $item) {
        $faculties .= $item->name . '; ';
    }
@endphp

<td class="text-center align-content-center">{{ $faculties }}</td>
{{--<td class="text-center align-content-center"></td>--}}
{{--<td class="text-center align-content-center"></td>--}}
<td class="text-center align-content-center">{{ date('d.m.Y', strtotime($student->created_at)) }}</td>

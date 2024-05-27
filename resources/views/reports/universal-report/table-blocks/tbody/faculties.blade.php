@php
    $faculties = '';
    $testingResults = '';

    foreach ($student->faculties as $item) {

        $faculties .= $item->name . '; ';

        if (is_null($item->pivot->testing)) {
            $testingResults .= '— ; ';
        } else {
            $testingResults .= $item->pivot->testing . '; ';
        }
    }

    $faculties = substr_replace($faculties, '', strripos($faculties, ';'));
    $testingResults = substr_replace($testingResults, '', strripos($testingResults, ';'));
@endphp

<td class="text-center align-content-center">{{ $faculties }}</td>
<td class="text-center align-content-center">{{ $testingResults }}</td>
{{--<td class="text-center align-content-center"></td>--}}
{{--<td class="text-center align-content-center"></td>--}}
<td class="text-center align-content-center">{{ date('d.m.Y', strtotime($student->created_at)) }}</td>

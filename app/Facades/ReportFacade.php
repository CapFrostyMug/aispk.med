<?php

namespace App\Facades;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportFacade
{
    protected object $faculty;

    public function __construct
    (
        Faculty $faculty = null,
    )
    {
        $this->faculty = $faculty ?: new Faculty();
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @return array
     */
    public function generateRating(Request $request): array
    {
        $faculties = $this->faculty->all();

        if ($request['faculty_id']) {

            $students = DB::table('students')
                ->join('educational', 'students.id', '=', 'educational.student_id')
                ->join('information_for_admission', 'students.id', '=', 'information_for_admission.student_id')
                ->join('financing_types', 'financing_types.id', '=', 'information_for_admission.financing_type_id')
                ->join('enrollment', 'students.id', '=', 'enrollment.student_id')
                ->join('student_special_circumstance', 'students.id', '=', 'student_special_circumstance.student_id')

                ->select(
                    'students.id', 'students.name as name', 'students.surname as surname', 'students.patronymic as patronymic',
                    'educational.avg_rating as avg_rating', 'educational.admission_testing as admission_testing',
                    'information_for_admission.is_original_docs as is_original_docs',
                    'financing_types.name as financing_type',
                    'student_special_circumstance.status as special_circumstance'
                )

                ->where('information_for_admission.faculty_id', '=', $request['faculty_id'])
                ->where('student_special_circumstance.special_circumstance_id', '=', 4)

                ->orderBy('student_special_circumstance.status', 'desc')
                ->orderBy('information_for_admission.is_original_docs', 'desc')
                ->orderBy('avg_rating', 'desc')

                ->paginate(config('paginate.studentsList'))->withQueryString();

            return [
                'faculties' => $faculties,
                'students' => $students,
            ];
        }

        return ['faculties' => $faculties];
    }
}

<?php

namespace App\Facades;

use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListFacade
{
    protected object $faculty;
    protected object $student;

    public function __construct
    (
        Faculty $faculty = null,
        Student $student = null,
    )
    {
        $this->faculty = $faculty ?: new Faculty();
        $this->student = $student ?: new Student();
    }

    /**
     * Метод позволяет получить список студентов: либо общий, либо отфильтрованный.
     *
     * @param Request $request
     * @return array
     */
    public function getList(Request $request): array
    {
        $faculties = $this->faculty->all();

        $facultyId = $request->input('faculty_id'); // int
        $financingTypesId = $request->input('financing_types'); // array
        $studentStatuses = $request->input('student_statuses'); // array
        $docsTypes = $request->input('docs_types'); // array

        $students = DB::table('students')
            ->join('information_for_admission', 'students.id', '=', 'information_for_admission.student_id')
            ->join('faculties', 'faculties.id', '=', 'information_for_admission.faculty_id')
            ->join('financing_types', 'financing_types.id', '=', 'information_for_admission.financing_type_id')
            ->join('enrollment', 'enrollment.student_id', '=', 'students.id')

            ->select('students.*', 'faculties.name as faculty')

            ->when($facultyId, function ($query, int $facultyId) {
                return $query->where('faculties.id', $facultyId);
            })
            ->when($financingTypesId, function ($query, array $financingTypesId) {
                return $query->whereIn('financing_types.id', array_values($financingTypesId));
            })
            ->when(isset($studentStatuses['enrolled']), function ($query) {
                return $query->whereNotNull('enrollment.decree_id');
            })
            ->when(isset($studentStatuses['not_enrolled']), function ($query) {
                return $query->whereNull('enrollment.decree_id');
            })
            ->when($docsTypes, function ($query, array $docsTypes) {
                return $query->whereIn('information_for_admission.is_original_docs', array_values($docsTypes));
            })

            ->orderBy('students.surname')

            ->paginate(config('paginate.studentsList'))->withQueryString();

        return [
            'faculties' => $faculties,
            'students' => $students,
        ];
    }

    /**
     * Метод для изменения статуса зачисления студентов.
     *
     * @param
     * @param
     * @return
     */
    public function changeEnrollmentData()
    {
        //
    }
}

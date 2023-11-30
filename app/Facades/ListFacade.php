<?php

namespace App\Facades;

use App\Models\Faculty;
use App\Models\FinancingType;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

final class ListFacade
{
    protected $faculty;
    protected $financing;
    protected $student;

    public function __construct
    (
        Faculty       $faculty = null,
        FinancingType $financing = null,
        Student       $student = null,
    )
    {
        $this->faculty = $faculty ?: new Faculty();
        $this->financing = $financing ?: new FinancingType();
        $this->student = $student ?: new Student();
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @return
     */
    public function filter(Request $request)
    {
        $query = $this->student->query()->with('faculties')->with('financingTypes');

        $query->whereRelation('faculties', 'faculties.id', '=', 1);

        $query->whereRelation('financingTypes', 'financing_types.id', '=', 1);

        $students = $query->get();

        dd($students);

        $students = $this->student->with('faculties')->get();

        foreach ($students as $student) {
            $faculties = $student->faculties()->where('faculties.id', 1)->where()->get();
            foreach ($faculties as $faculty) {
                dump($student->id . ', ' . $student->name . ', ' . $faculty->name);
            }
        }

        dd();

        $request = $request->query();

        if (!empty($request)) {

            $studentQuery = $this->student->query()
                ->join('information_for_admission', 'students.id', '=', 'information_for_admission.student_id')
                ->join('enrollment', 'students.id', '=', 'enrollment.student_id')
                ->join('faculties', 'faculties.id', '=', 'information_for_admission.faculty_id')
                ->join('financing_types', 'financing_types.id', '=', 'information_for_admission.financing_type_id')
                ->select('students.*')
                ->orderBy('students.id');

            /* Выборка студентов по специальности */

            if (isset($request['faculty'])) {
                $studentQuery->filterByFaculties($request);
            }

            /* Выборка студентов по финансированию */

            if (isset($request['financingType'])) {
                $studentQuery->filterByFinancingTypes($request);
            }

            /* Выборка студентов по зачислению */

            if (isset($request['studentStatus'])) {
                $studentQuery->filterByEnrollmentStatus($request);
            }

            /* Выборка студентов по типу документов */

            if (isset($request['docsType'])) {
                $studentQuery->filterByOriginalDocs($request);
            }

            $students = $studentQuery->paginate(config('paginate.studentsList'))->withQueryString();

        } else {
            $students = $this->student
                ->with('faculties')
                ->with('financingTypes')
                ->with('enrollment')
                ->with('educational')
                ->paginate(config('paginate.studentsList'))->withQueryString();
        }

        return [
            'faculties' => $this->faculty->all(),
            'students' => $students,
            'request' => $request ?? null,
        ];
    }
}

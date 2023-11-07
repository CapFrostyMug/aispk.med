<?php

namespace App\Facades;

use App\Models\Faculty;
use App\Models\FinancingType;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
     * @return array
     */
    public function viewAndPrintIndex()
    {
        return [
            'faculties' => $this->faculty->all(),
            'students' => $this->student->paginate(config('paginate.studentsList'))->withQueryString(),
        ];
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @return
     */
    public function filter(Request $request)
    {
        $studentQuery = $this->student->query();

        $request = $request->query();

        /* Выборка студентов по специальности */

        if (isset($request['faculty'])) {
            $studentQuery->whereRelation('faculties', 'faculty_id', '=', 1);
        }

        /* Выборка студентов по финансированию */

        if (isset($request['financingType']['Budget'])) {
            $studentQuery->whereRelation('financingTypes', 'financing_type_id', '=', 1);
        }

        if (isset($request['financingType']['Contract'])) {
            $studentQuery->whereRelation('financingTypes', 'financing_type_id', '=', 2);
        }

        if (isset($request['financingType']['ContractPossible'])) {
            $studentQuery->whereRelation('financingTypes', 'financing_type_id', '=', 3);
        }

        /* Выборка студентов по зачислению */

        /* Выборка студентов по типу документов */

        $students = $studentQuery->paginate(config('paginate.studentsList'))->withQueryString();

        return [
            'faculties' => $this->faculty->all(),
            'selectedFaculty' => $request['faculty'],
            'students' => $students,
        ];
    }
}

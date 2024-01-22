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
        $faculties = $this->faculty->all();
        $students = $this->student
            ->with('faculties')
            ->with('financingTypes')
            ->with('enrollment')
            ->with('educational')
            ->paginate(config('paginate.studentsList'))->withQueryString();
            //->get();

        //dd($students);

        return [
            'faculties' => $faculties,
            'students' => $students,
            'request' => $request ?? null, // Отображение кол-ва наденных записей
        ];
    }
}

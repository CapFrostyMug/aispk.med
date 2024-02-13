<?php

namespace App\Facades;

use App\Models\Faculty;
use App\Models\FinancingType;
use App\Models\Student;
use Illuminate\Http\Request;

class ListFacade
{
    protected object $faculty;
    protected object $financing;
    protected object $student;

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
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {
        $faculties = $this->faculty->all();
        $students = $this->student
            ->with('faculties')
            ->with('financingTypes')
            ->with('enrollment')
            ->with('educational')
            ->paginate(config('paginate.studentsList'))->withQueryString();

        return [
            'faculties' => $faculties,
            'students' => $students,
            'request' => $request ?? null, // Отображение кол-ва наденных записей
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

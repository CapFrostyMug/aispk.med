<?php

namespace App\Facades;

use App\Models\Faculty;
use Illuminate\Http\Request;

final class ListFacade
{
    protected $faculty;

    public function __construct
    (
        Faculty $faculty = null,
    )
    {
        $this->faculty = $faculty ?: new Faculty();
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return ['faculties' => $this->faculty->all()];
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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function show(Request $request)
    {
        $selectedFaculty = $this->faculty->where('id', $request->faculty)->first();
        $studentsList = $selectedFaculty->students;

        return [
            'faculties' => $this->index()['faculties'],
            'students' => $studentsList,
        ];
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

    /**
     * [Method description].
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search()
    {
        return $this->faculty->all();
    }
}

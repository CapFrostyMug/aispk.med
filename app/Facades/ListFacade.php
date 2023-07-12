<?php


namespace App\Facades;


use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * [Method description].
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search()
    {
        return $this->faculty->all();
    }

    /**
     * [Method description].
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find(Request $request)
    {
        $faculty = $this->faculty->where('id', $request->faculty)->first();
        // TODO Attempt to read property "students" on null
        $students = $faculty->students;

        return $students;
    }
}

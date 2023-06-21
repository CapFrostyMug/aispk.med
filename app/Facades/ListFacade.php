<?php


namespace App\Facades;


use App\Queries\FacultyQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ListFacade
{
    protected $faculty;

    public function __construct(
        FacultyQueryBuilder $faculty = null,
    )
    {
        $this->faculty = $faculty ?: new FacultyQueryBuilder();
    }

    public function index()
    {
        //
    }

    public function search(): Collection|null
    {
        return $this->faculty->getModels();
    }

    public function find(Request $request)
    {
        $faculty = $this->faculty->getModel($request->faculty);
        $students = $faculty->students;

        return $students;
    }
}

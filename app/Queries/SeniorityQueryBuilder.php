<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\Seniority;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

final class SeniorityQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Seniority::query();
    }

    public function getModel(Request $request): Model|null
    {
        // TODO: Implement getModel() method.
    }

    public function getModels()
    {
        // TODO: Implement getModels() method.
    }

    public function create(Request $request, $student = 0): Model
    {
        return $this->model->create([
            'student_id' => $student->id,
            'place_work' => $request->placeWork,
            'profession' => $request->profession,
            'years' => $request->seniorityYears,
            'months' => $request->seniorityMonths,
        ]);
    }
}

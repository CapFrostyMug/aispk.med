<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\StudentsParentMother;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

final class StParentMotherQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = StudentsParentMother::query();
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
            'name' => $request->motherName,
            'surname' => $request->motherSurname,
            'patronymic' => $request->motherPatronymic,
            'phone' => $request->motherPhone,
        ]);
    }
}

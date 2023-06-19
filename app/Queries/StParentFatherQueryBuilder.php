<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\StudentsParentFather;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

final class StParentFatherQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = StudentsParentFather::query();
    }

    public function getModel($data, $column = ''): Model|null
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
            'name' => $request->fatherName,
            'surname' => $request->fatherSurname,
            'patronymic' => $request->fatherPatronymic,
            'phone' => $request->fatherPhone,
        ]);
    }
}

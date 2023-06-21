<?php

namespace App\Queries;

use App\Models\StudentsParentMother;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class StParentMotherQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = StudentsParentMother::query();
    }

    public function create(Request $request, $student): void
    {
        $this->model->create([
            'student_id' => $student->id,
            'name' => $request->motherName,
            'surname' => $request->motherSurname,
            'patronymic' => $request->motherPatronymic,
            'phone' => $request->motherPhone,
        ]);
    }

    public function update(Request $request, $studentId)
    {
        $this->model
            ->where('student_id', $studentId)
            ->update([
                'student_id' => $studentId,
                'name' => $request->fatherName,
                'surname' => $request->fatherSurname,
                'patronymic' => $request->fatherPatronymic,
                'phone' => $request->fatherPhone,
            ]);
    }
}

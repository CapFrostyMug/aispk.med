<?php

namespace App\Queries;

use App\Models\Seniority;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class SeniorityQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Seniority::query();
    }

    public function create(Request $request, $student): void
    {
        $this->model->create([
            'student_id' => $student->id,
            'place_work' => $request->placeWork,
            'profession' => $request->profession,
            'years' => $request->seniorityYears,
            'months' => $request->seniorityMonths,
        ]);
    }

    public function update(Request $request, $studentId)
    {
        $this->model
            ->where('student_id', $studentId)
            ->update([
                'student_id' => $studentId,
                'place_work' => $request->placeWork,
                'profession' => $request->profession,
                'years' => $request->seniorityYears,
                'months' => $request->seniorityMonths,
            ]);
    }
}

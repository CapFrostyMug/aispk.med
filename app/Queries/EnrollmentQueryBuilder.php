<?php

namespace App\Queries;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class EnrollmentQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Enrollment::query();
    }

    public function create(Request $request, $student): void
    {
        $this->model->create([
            'student_id' => $student->id,
            'faculty_id' => $request->facultyAdmitted,
            'decree_id' => $request->decree,
            'is_pickup_docs' => $request->pickupDocs,
        ]);
    }

    public function update(Request $request, $studentId)
    {
        $this->model
            ->where('student_id', $studentId)
            ->update([
                'student_id' => $studentId,
                'faculty_id' => $request->facultyAdmitted,
                'decree_id' => $request->decree,
                'is_pickup_docs' => $request->pickupDocs,
            ]);
    }
}

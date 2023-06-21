<?php

namespace App\Queries;

use App\Models\Educational;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class EducationalQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Educational::query();
    }

    public function create(Request $request, $student): void
    {
        $this->model->create([
            'student_id' => $student->id,
            'ed_institution_type_id' => $request->educationalInstitutionType,
            'ed_doc_type_id' => $request->educationalDocType,
            'ed_doc_number' => $request->educationalDocNumber,
            'ed_institution_name' => $request->educationalInstitutionName,
            'is_first_spo' => $request->firstProfession,
            'is_excellent_student' => $request->excellentStudent,
            'avg_rating' => $request->avgRating,
            'issue_date' => $request->issueDateEducationalDoc,
        ]);
    }

    public function update(Request $request, $studentId)
    {
        $this->model
            ->where('student_id', $studentId)
            ->update([
                'student_id' => $studentId,
                'ed_institution_type_id' => $request->educationalInstitutionType,
                'ed_doc_type_id' => $request->educationalDocType,
                'ed_doc_number' => $request->educationalDocNumber,
                'ed_institution_name' => $request->educationalInstitutionName,
                'is_first_spo' => $request->firstProfession,
                'is_excellent_student' => $request->excellentStudent,
                'avg_rating' => $request->avgRating,
                'issue_date' => $request->issueDateEducationalDoc,
            ]);
    }
}

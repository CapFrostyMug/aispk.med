<?php


namespace App\Queries;


use App\Interfaces\iQueryBuilder;
use App\Models\Educational;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

final class EducationalQueryBuilder implements iQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Educational::query();
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

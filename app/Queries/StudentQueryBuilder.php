<?php

namespace App\Queries;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

final class StudentQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Student::query();
    }

    public function getModel($id): Model|null
    {
        return $this->model->find($id);
    }

    public function getModelWithRelations($studentId)
    {
        return $this->model
            ->with('passport')
            ->with('educational')
            ->with('seniority')
            ->with('studentsParentFather')
            ->with('studentsParentMother')
            ->with('specialCircumstances')
            ->with('enrollment')
            ->find($studentId);
    }

    public function create(Request $request, $passport): Model
    {
        return $this->model->create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'passport_id' => $passport->id,
            'phone' => $request->phone,
            'email' => $request->email,
            'language_id' => $request->language,
            'about_me' => $request->aboutMe,
        ]);
    }

    public function update(Request $request, $studentId, $passportId)
    {
        $this->model
            ->where('id', $studentId)
            ->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'passport_id' => $passportId,
                'phone' => $request->phone,
                'email' => $request->email,
                'language_id' => $request->language,
                'about_me' => $request->aboutMe,
            ]);
    }

    public function updateInformationForAdmissionTable(Request $request, $student)
    {
        $student = $this->getModel($student->id);

        $student->faculties()->detach();

        $admissionInfo = $request->data;

        foreach ($admissionInfo as $blockName => $blockContent) {
            $student->faculties()->attach($blockContent['faculty_id'], [
                    'student_id' => $student->id,
                    'financing_type_id' => $blockContent['financing_type_id'],
                    'is_original_docs' => $blockContent['is_original_docs'],
                ]
            );
        }
    }

    public function updateStudentSpecialCircumstanceTable(Request $request, $student)
    {
        $student = $this->getModel($student->id);

        $student->specialCircumstances()->detach();

        $specialCircumstance = $request->circumstance;

        foreach ($specialCircumstance as $circumstanceId => $circumstanceValue) {
            $student->specialCircumstances()->attach($circumstanceId, [
                    'student_id' => $student->id,
                    'status' => $circumstanceValue,
                ]
            );
        }
    }
}

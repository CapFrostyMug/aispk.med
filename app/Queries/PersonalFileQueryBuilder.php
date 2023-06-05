<?php


namespace App\Queries;

use App\Models\Decree;
use App\Models\Educational;
use App\Models\EducationalDocType;
use App\Models\EducationalInstitutionType;
use App\Models\Enrollment;
use App\Models\Faculty;
use App\Models\FinancingType;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\Passport;
use App\Models\Seniority;
use App\Models\SpecialCircumstance;
use App\Models\Student;
use App\Models\StudentsParentFather;
use App\Models\StudentsParentMother;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


final class PersonalFileQueryBuilder
{
    private Builder $nationality;
    private Builder $educationalInstitutionType;
    private Builder $language;
    private Builder $financingType;
    private Builder $faculty;
    private Builder $educationalDocType;
    private Builder $decree;
    private Builder $specialCircumstances;

    private Builder $passport;
    private Builder $student;
    private Builder $educational;
    private Builder $seniority;
    private Builder $studentsParentFather;
    private Builder $studentsParentMother;
    private Builder $enrollment;

    public function __construct()
    {
        $this->nationality = Nationality::query();
        $this->educationalInstitutionType = EducationalInstitutionType::query();
        $this->language = Language::query();
        $this->financingType = FinancingType::query();
        $this->faculty = Faculty::query();
        $this->educationalDocType = EducationalDocType::query();
        $this->decree = Decree::query();
        $this->specialCircumstances = SpecialCircumstance::query();

        $this->passport = Passport::query();
        $this->student = Student::query();
        $this->educational = Educational::query();
        $this->seniority = Seniority::query();
        $this->studentsParentFather = StudentsParentFather::query();
        $this->studentsParentMother = StudentsParentMother::query();
        $this->enrollment = Enrollment::query();
    }

    public function create(Request $request)
    {
        $passport = $this->passport->updateOrCreate
        (
            [
                'number' => $request->passportNumber,
            ],
            [
                'birthday' => $request->birthday,
                'birthplace' => $request->birthplace,
                'gender' => $request->gender,
                'nationality_id' => $request->nationality,
                'issue_by' => $request->issueBy,
                'issue_date' => $request->issueDatePassport,
                'address_registered' => $request->addressRegistered,
                'address_residential' => $request->addressResidential,
            ]
        );

        $student = $this->student->updateOrCreate
        (
            [
                'passport_id' => $passport->id,
            ],
            [
                'name' => $request->firstName,
                'surname' => $request->lastName,
                'patronymic' => $request->patronymic,
                'phone' => $request->phone,
                'email' => $request->email,
                'language_id' => $request->language,
                'about_me' => $request->aboutMe,
            ]
        );

        $educational = $this->educational->updateOrCreate
        (
            [
                'student_id' => $student->id,
            ],
            [
                'ed_institution_type_id' => $request->educationalInstitutionType,
                'ed_doc_type_id' => $request->educationalDocType,
                'ed_doc_number' => $request->educationalDocNumber,
                'ed_institution_name' => $request->educationalInstitutionName,
                'is_first_spo' => $request->firstProfession,
                'is_excellent_student' => $request->excellentStudent,
                'avg_rating' => $request->avgRating,
                'issue_date' => $request->issueDateEducationalDoc,
            ]
        );

        $seniority = $this->seniority->updateOrCreate
        (
            [
                'student_id' => $student->id,
            ],
            [
                'place_work' => $request->placeWork,
                'profession' => $request->profession,
                'years' => $request->seniorityYears,
                'months' => $request->seniorityMonths,
            ]
        );

        $studentsParentFather = $this->studentsParentFather->updateOrCreate(
            [
                'student_id' => $student->id,
            ],
            [
                'name' => $request->fatherName,
                'surname' => $request->fatherSurname,
                'patronymic' => $request->fatherPatronymic,
                'phone' => $request->fatherPhone,
            ]
        );

        $studentsParentMother = $this->studentsParentMother->updateOrCreate(
            [
                'student_id' => $student->id,
            ],
            [
                'name' => $request->motherName,
                'surname' => $request->motherSurname,
                'patronymic' => $request->motherPatronymic,
                'phone' => $request->motherPhone,
            ]
        );

        $enrollment = $this->enrollment->updateOrCreate(
            [
                'student_id' => $student->id,
            ],
            [
                'faculty_id' => $request->facultyAdmitted,
                'decree_id' => $request->decree,
                'is_pickup_docs' => $request->pickupDocs,
            ]
        );

        $admissionInfo = $request->data;

        foreach ($admissionInfo as $blockName => $blockContent) {
            $student->faculties()->attach($blockContent['faculty_id'], [
                    'student_id' => $student->id,
                    'financing_type_id' => $blockContent['financing_type_id'],
                    'is_original_docs' => $blockContent['is_original_docs'],
                ]
            );
        }

        /*$student->specialCircumstances()->attach(
            [
                //
            ],
            [
                //
            ]
        );*/
    }

    public function edit($id)
    {
        $student = $this->student->find($id);

        $data = [];
        $counter = 1;

        foreach ($student->faculties as $faculty) {
            $data['block' . $counter] = $faculty->pivot->getAttributes();
            $counter++;
        }

        //dd($data);
        return $data;
    }

    public function search($search)
    {
        $search = iconv_substr($search, 0, 20);
        $search = preg_replace('#[^0-9a-zA-ZА]#u', '', $search);
        $search = preg_replace('#\s+#u', '', $search);
        $search = strtoupper($search);

        $passport = Passport::firstWhere('number', $search);

        if (!is_null($passport)) {
            return $passport->student;
        }

        return '';
    }

    public function getRelatedModels(): array
    {
        return $models = [
            'nationality' => $this->nationality->get(),
            'educationalInstitutionTypes' => $this->educationalInstitutionType->get(),
            'languages' => $this->language->get(),
            'financing' => $this->financingType->get(),
            'faculties' => $this->faculty->get(),
            'educationalDocTypes' => $this->educationalDocType->get(),
            'decrees' => $this->decree->get(),
            'specialCircumstances' => $this->specialCircumstances->get(),
        ];
    }
}

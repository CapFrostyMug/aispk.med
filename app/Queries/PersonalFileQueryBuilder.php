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


final class PersonalFileQueryBuilder
{
    private Nationality $nationality;
    private EducationalInstitutionType $educationalInstitutionType;
    private Language $language;
    private FinancingType $financingType;
    private Faculty $faculty;
    private EducationalDocType $educationalDocType;
    private Decree $decree;
    private SpecialCircumstance $specialCircumstances;

    public function __construct
    (
        Nationality $nationality,
        EducationalInstitutionType $educationalInstitutionType,
        Language $language,
        FinancingType $financingType,
        Faculty $faculty,
        EducationalDocType $educationalDocType,
        Decree $decree,
        SpecialCircumstance $specialCircumstances,
    )
    {
        $this->nationality = $nationality;
        $this->educationalInstitutionType = $educationalInstitutionType;
        $this->language = $language;
        $this->financingType = $financingType;
        $this->faculty = $faculty;
        $this->educationalDocType = $educationalDocType;
        $this->decree = $decree;
        $this->specialCircumstances = $specialCircumstances;
    }

    public function create(Request $request)
    {
        $passport = Passport::updateOrCreate
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

        $student = Student::updateOrCreate
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

        $educational = Educational::updateOrCreate
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

        $seniority = Seniority::updateOrCreate
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

        $studentsParentFather = StudentsParentFather::updateOrCreate(
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

        $studentsParentMother = StudentsParentMother::updateOrCreate(
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

        $enrollment = Enrollment::updateOrCreate(
            [
                'student_id' => $student->id,
            ],
            [
                'faculty_id' => $request->facultyAdmitted,
                'decree_id' => $request->decree,
                'is_pickup_docs' => $request->pickupDocs,
            ]
        );

        /*$student->faculties()->attach($request->faculty, [
                'student_id' => $student->id,
                'financing_type_id' => $request->financing,
                'is_original_docs' => $request->originalDocs,
            ]
        );*/

        /*$student->specialCircumstances()->attach(
            [
                //
            ],
            [
                //
            ]
        );*/
    }

    public function edit()
    {
        //
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
            'nationality' => $this->nationality::all(),
            'educationalInstitutionTypes' => $this->educationalInstitutionType::all(),
            'languages' => $this->language::all(),
            'financing' => $this->financingType::all(),
            'faculties' => $this->faculty::all(),
            'educationalDocTypes' => $this->educationalDocType::all(),
            'decrees' => $this->decree::all(),
            'specialCircumstances' => $this->specialCircumstances::all(),
        ];
    }
}

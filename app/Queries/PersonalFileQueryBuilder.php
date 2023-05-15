<?php


namespace App\Queries;

use App\Models\EducationalDocType;
use App\Models\EducationalInstitutionType;
use App\Models\Faculty;
use App\Models\FinancingType;
use App\Models\Language;
use App\Models\Nationality;
use App\Models\Passport;
use App\Models\Student;
use Illuminate\Http\Request;


final class PersonalFileQueryBuilder
{
    private Nationality $nationality;
    private EducationalInstitutionType $educationalInstitutionType;
    private Language $language;
    private FinancingType $financingType;
    private Faculty $faculty;
    private EducationalDocType $educationalDocType;

    public function __construct
    (
        Nationality $nationality,
        EducationalInstitutionType $educationalInstitutionType,
        Language $language,
        FinancingType $financingType,
        Faculty $faculty,
        EducationalDocType $educationalDocType,
    )
    {
        $this->nationality = $nationality;
        $this->educationalInstitutionType = $educationalInstitutionType;
        $this->language = $language;
        $this->financingType = $financingType;
        $this->faculty = $faculty;
        $this->educationalDocType = $educationalDocType;
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
            ],
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
            ],
        );
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
            'faculty' => $this->faculty::all(),
            'educationalDocType' => $this->educationalDocType::all(),
        ];
    }
}

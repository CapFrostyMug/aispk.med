<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonalFileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $student = Student::find($this->id);
        $passportId = null;

        if (isset($student)) {
            $passportId = $student->passport->id;
        }

        return [
            'surname' => 'alpha_dash|between:2,30|required',
            'name' => 'alpha_dash|between:2,30|required',
            'patronymic' => 'alpha_dash|between:5,30|nullable',
            'gender' => 'alpha|between:4,6|required',
            'birthday' => 'date|required',
            'nationality' => 'integer|exists:App\Models\Nationality,id|required',
            'birthplace' => 'string|between:3,150|required',

            'passportNumber' => [
                'alpha_dash', 'between:5,20', 'required',
                Rule::unique('passports', 'number')->ignore($passportId),
            ],
            'issueDatePassport' => 'date|required',
            'issueBy' => 'string|between:10,150|required',

            'addressRegistered' => 'string|between:10,180|required',
            'addressResidential' => 'string|between:10,180|required',

            'phone' => [
                'digits:11', 'integer', 'nullable',
                Rule::unique('students', 'phone')->ignore($this->id),
            ],
            'email' => [
                'email:rfc', 'nullable',
                Rule::unique('students', 'email')->ignore($this->id),
            ],

            'data' => 'array|required',

            'educationalInstitutionName' => 'string|between:3,255|required',
            'educationalInstitutionType' => 'integer|exists:App\Models\EducationalInstitutionType,id|required',
            'language' => 'integer|exists:App\Models\Language,id|required',
            'educationalDocType' => 'integer|exists:App\Models\EducationalDocType,id|required',
            'excellentStudent' => 'boolean|required',
            'educationalDocNumber' => [
                'alpha_dash', 'between:6,30', 'required',
                Rule::unique('educational', 'ed_doc_number')->ignore($this->id, 'student_id'),
            ],
            'issueDateEducationalDoc' => 'date|required',
            'avgRating' => 'numeric|min:1|max:5|required',
            'admissionTesting' => 'numeric|min:0|max:10|nullable',
            'firstProfession' => 'boolean|required',

            'placeWork' => 'string|between:3,100|nullable',
            'profession' => 'string|between:3,75|nullable',
            'seniorityYears' => 'integer|between:1,100|nullable',
            'seniorityMonths' => 'integer|between:1,12|nullable',

            'circumstance' => 'array|required',
            'aboutMe' => 'string|min:10|max:300|nullable',

            'fatherSurname' => 'alpha_dash|between:2,30|nullable',
            'fatherName' => 'alpha_dash|between:2,30|nullable',
            'fatherPatronymic' => 'alpha_dash|between:5,30|nullable',
            'fatherPhone' => [
                'digits:11', 'integer', 'nullable',
                Rule::unique('student_parent_fathers', 'phone')->ignore($this->id, 'student_id'),
            ],

            'motherSurname' => 'alpha_dash|between:2,30|nullable',
            'motherName' => 'alpha_dash|between:2,30|nullable',
            'motherPatronymic' => 'alpha_dash|between:5,30|nullable',
            'motherPhone' => [
                'digits:11', 'integer', 'nullable',
                Rule::unique('student_parent_mothers', 'phone')->ignore($this->id, 'student_id'),
            ],

            'facultyAdmitted' => 'integer|exists:App\Models\Faculty,id|nullable',
            'decree' => 'integer|exists:App\Models\Decree,id|nullable',
            'pickupDocs' => 'boolean|required',
        ];
    }

    /**
     * [Method description].
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'passportNumber' => '«серия и номер паспорта»',
            'issueDatePassport' => '«дата выдачи»',
            'issueBy' => '«паспорт выдан»',
            'addressRegistered' => '«адрес по прописке»',
            'addressResidential' => '«адрес проживания»',
            'data' => '«»',
            'educationalInstitutionName' => '«наименование учебного заведения»',
            'educationalInstitutionType' => '«тип учебного заведения»',
            'language' => '«иностранный язык»',
            'educationalDocType' => '«тип документа об образовании»',
            'excellentStudent' => '«окончил обучение с отличием»',
            'educationalDocNumber' => '«серия и номер документа»',
            'issueDateEducationalDoc' => '«дата выдачи»',
            'avgRating' => '«средний балл»',
            'admissionTesting' => '«тестирование»',
            'firstProfession' => '«абитуриент получает СПО впервые»',
            'placeWork' => '«место работы»',
            'profession' => '«должность, специализация»',
            'seniorityYears' => '«стаж, лет»',
            'seniorityMonths' => '«стаж, месяцев»',
            'aboutMe' => '«о себе»',
            'fatherSurname' => '«фамилия»',
            'fatherName' => '«имя»',
            'fatherPatronymic' => '«отчество»',
            'fatherPhone' => '«телефон»',
            'motherSurname' => '«фамилия»',
            'motherName' => '«имя»',
            'motherPatronymic' => '«отчество»',
            'motherPhone' => '«телефон»',
            'facultyAdmitted' => '«зачислен на специальность»',
            'decree' => '«номер приказа»',
            'pickupDocs' => '«абитуриент забрал документы»',
        ];
    }
}

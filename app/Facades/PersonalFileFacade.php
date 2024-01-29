<?php

namespace App\Facades;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

final class PersonalFileFacade extends Facade
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return array
     */
    public function create(): array
    {
        return $this->getLists();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $validatedData
     * @return string|object
     */
    public function store(array $validatedData): string|object
    {
        try {
            DB::transaction(function () use ($validatedData) {

                $this->passport = $this->passport->create([
                    'birthday' => $validatedData['birthday'],
                    'birthplace' => $validatedData['birthplace'],
                    'number' => str_replace(' ', '', strtoupper($validatedData['passportNumber'])),
                    'gender' => $validatedData['gender'],
                    'nationality_id' => $validatedData['nationality'],
                    'issue_by' => $validatedData['issueBy'],
                    'issue_date' => $validatedData['issueDatePassport'],
                    'address_registered' => $validatedData['addressRegistered'],
                    'address_residential' => $validatedData['addressResidential'],
                ]);

                $this->student = $this->student->create([
                    'name' => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                    'patronymic' => $validatedData['patronymic'],
                    'passport_id' => $this->passport->id,
                    'phone' => $validatedData['phone'],
                    'email' => $validatedData['email'],
                    'language_id' => $validatedData['language'],
                    'about_me' => $validatedData['aboutMe'],
                ]);

                $this->educational->create([
                    'student_id' => $this->student->id,
                    'ed_institution_type_id' => $validatedData['educationalInstitutionType'],
                    'ed_doc_type_id' => $validatedData['educationalDocType'],
                    'ed_doc_number' => str_replace(' ', '', strtoupper($validatedData['educationalDocNumber'])),
                    'ed_institution_name' => $validatedData['educationalInstitutionName'],
                    'is_first_spo' => $validatedData['firstProfession'],
                    'is_excellent_student' => $validatedData['excellentStudent'],
                    'avg_rating' => $validatedData['avgRating'],
                    'admission_testing' => $validatedData['admissionTesting'],
                    'issue_date' => $validatedData['issueDateEducationalDoc'],
                ]);

                $this->seniority->create([
                    'student_id' => $this->student->id,
                    'place_work' => $validatedData['placeWork'],
                    'profession' => $validatedData['profession'],
                    'years' => $validatedData['seniorityYears'],
                    'months' => $validatedData['seniorityMonths'],
                ]);

                $this->studentsParentFather->create([
                    'student_id' => $this->student->id,
                    'name' => $validatedData['fatherName'],
                    'surname' => $validatedData['fatherSurname'],
                    'patronymic' => $validatedData['fatherPatronymic'],
                    'phone' => $validatedData['fatherPhone'],
                ]);

                $this->studentsParentMother->create([
                    'student_id' => $this->student->id,
                    'name' => $validatedData['motherName'],
                    'surname' => $validatedData['motherSurname'],
                    'patronymic' => $validatedData['motherPatronymic'],
                    'phone' => $validatedData['motherPhone'],
                ]);

                $this->enrollment->create([
                    'student_id' => $this->student->id,
                    'faculty_id' => $validatedData['facultyAdmitted'],
                    'decree_id' => $validatedData['decree'],
                    'is_pickup_docs' => $validatedData['pickupDocs'],
                ]);

                $admissionInfo = $validatedData['data'];

                foreach ($admissionInfo as $blockName => $blockContent) {
                    $this->student->faculties()->attach($blockContent['faculty_id'], [
                            'student_id' => $this->student->id,
                            'financing_type_id' => $blockContent['financing_type_id'],
                            'is_original_docs' => $blockContent['is_original_docs'],
                        ]
                    );
                }

                $specialCircumstance = $validatedData['circumstance'];

                foreach ($specialCircumstance as $circumstanceId => $circumstanceValue) {
                    $this->student->specialCircumstances()->attach($circumstanceId, [
                            'student_id' => $this->student->id,
                            'status' => $circumstanceValue,
                        ]
                    );
                }

            }, 3);

            return $this->student->id;

        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function show(Request $request, int $id): array
    {
        return array_merge($this->getLists(), $this->getStudentWithRelatedModels($id) ?: []);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return array
     */
    public function edit(int $id): array
    {
        return array_merge($this->getLists(), $this->getStudentWithRelatedModels($id) ?: []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $validatedData
     * @param int $id
     * @return null|object
     */
    public function update(array $validatedData, int $id)//: null|object
    {
        $student = $this->student->find($id);
        $passportId = $student->passport->id;

        try {
            DB::transaction(function () use ($student, $passportId, $validatedData) {

                $this->passport->where('id', $passportId)->update([
                    'birthday' => $validatedData['birthday'],
                    'birthplace' => $validatedData['birthplace'],
                    'number' => str_replace(' ', '', strtoupper($validatedData['passportNumber'])),
                    'gender' => $validatedData['gender'],
                    'nationality_id' => $validatedData['nationality'],
                    'issue_by' => $validatedData['issueBy'],
                    'issue_date' => $validatedData['issueDatePassport'],
                    'address_registered' => $validatedData['addressRegistered'],
                    'address_residential' => $validatedData['addressResidential'],
                ]);

                $this->student->where('id', $student->id)->update([
                    'name' => $validatedData['name'],
                    'surname' => $validatedData['surname'],
                    'patronymic' => $validatedData['patronymic'],
                    'phone' => $validatedData['phone'],
                    'email' => $validatedData['email'],
                    'language_id' => $validatedData['language'],
                    'about_me' => $validatedData['aboutMe'],
                ]);

                $this->educational->where('student_id', $student->id)->update([
                    'ed_institution_type_id' => $validatedData['educationalInstitutionType'],
                    'ed_doc_type_id' => $validatedData['educationalDocType'],
                    'ed_doc_number' => str_replace(' ', '', strtoupper($validatedData['educationalDocNumber'])),
                    'ed_institution_name' => $validatedData['educationalInstitutionName'],
                    'is_first_spo' => $validatedData['firstProfession'],
                    'is_excellent_student' => $validatedData['excellentStudent'],
                    'avg_rating' => $validatedData['avgRating'],
                    'admission_testing' => $validatedData['admissionTesting'],
                    'issue_date' => $validatedData['issueDateEducationalDoc'],
                ]);

                $this->seniority->where('student_id', $student->id)->update([
                    'place_work' => $validatedData['placeWork'],
                    'profession' => $validatedData['profession'],
                    'years' => $validatedData['seniorityYears'],
                    'months' => $validatedData['seniorityMonths'],
                ]);

                $this->studentsParentFather->where('student_id', $student->id)->update([
                    'name' => $validatedData['fatherName'],
                    'surname' => $validatedData['fatherSurname'],
                    'patronymic' => $validatedData['fatherPatronymic'],
                    'phone' => $validatedData['fatherPhone'],
                ]);

                $this->studentsParentMother->where('student_id', $student->id)->update([
                    'name' => $validatedData['motherName'],
                    'surname' => $validatedData['motherSurname'],
                    'patronymic' => $validatedData['motherPatronymic'],
                    'phone' => $validatedData['motherPhone'],
                ]);

                $this->enrollment->where('student_id', $student->id)->update([
                    'faculty_id' => $validatedData['facultyAdmitted'],
                    'decree_id' => $validatedData['decree'],
                    'is_pickup_docs' => $validatedData['pickupDocs'],
                ]);

                $this->student->updateInformationForAdmissionTable($validatedData, $student);
                $this->student->updateStudentSpecialCircumstanceTable($validatedData, $student);

            }, 3);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return null|string
     */
    public function destroy(int $id)//: null|string
    {
        try {
            $student = $this->student->find($id);
            $passport = $student->passport;

            $student->delete();
            $passport->delete();
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * [Method description].
     *
     * @return array
     */
    public function getLists(): array
    {
        return [
            'nationality' => $this->nationality->all(),
            'faculties' => $this->faculty->all(),
            'financing' => $this->financing->all(),
            'educationalInstitutionTypes' => $this->edInstitutionType->all(),
            'languages' => $this->language->all(),
            'educationalDocTypes' => $this->edDocType->all(),
            'specialCircumstances' => $this->specialCircumstance->all(),
            'decrees' => $this->decree->all(),
        ];
    }

    /**
     * [Method description].
     *
     * @param int $id
     * @return null|array
     */
    public function getStudentWithRelatedModels(int $id): null|array
    {
        $student = $this->student
            ->with('passport')
            ->with('educational')
            ->with('seniority')
            ->with('studentsParentFather')
            ->with('studentsParentMother')
            ->with('specialCircumstances')
            ->with('enrollment')
            ->find($id);

        if (is_null($student)) {
            return null;
        }

        $facultiesBlocks = [];
        $counterFacultiesBlocks = 1;

        foreach ($student->faculties as $faculty) {
            $facultiesBlocks['block_' . $counterFacultiesBlocks] = $faculty->pivot->getAttributes();
            $counterFacultiesBlocks++;
        }

        return [
            'student' => $student,
            'passport' => $student->passport,
            'educational' => $student->educational,
            'seniority' => $student->seniority,
            'studentsParentFather' => $student->studentsParentFather,
            'studentsParentMother' => $student->studentsParentMother,
            'specialCircumstancesForEdit' => $student->specialCircumstances,
            'enrollment' => $student->enrollment,
            'facultiesBlocks' => $facultiesBlocks,
        ];
    }

    /**
     * [Method description].
     *
     * @param Request $request
     * @return object|array
     */
    public function find(Request $request): object|array
    {
        $validatedData = $request->validate(['search' => 'alpha_dash', 'between:5,20']);
        $passport = $this->passport->findPassportByNumber($validatedData);

        return $passport ? $passport->student : [];
    }

    /**
     * [Method description].
     *
     * @param int $id
     * @return string
     */
    public function exportApplicationToWord(int $id): string
    {
        $data = array_merge($this->getLists(), $this->getStudentWithRelatedModels($id));

        $templateProcessor = new TemplateProcessor('ms_office_templates/college_application_template.docx');

        $faculties = [];
        $facultyWithOriginalDocs = '';
        $specialCircumstances = [];

        /** Формируем массив из названий специальностей */
        foreach ($data['facultiesBlocks'] as $block) {
            $faculties[] = $this->faculty->where('id', $block['faculty_id'])->first()->name;
        }

        /** Ищем специальность, на которую поданы оригиналы документов */
        foreach ($data['facultiesBlocks'] as $block) {
            if ($block['is_original_docs']) {
                $facultyWithOriginalDocs = $this->faculty->where('id', $block['faculty_id'])->first()->name;
                break;
            }
        }

        /** Формируем массив из "особых обстоятельств", задействуя сводную таблицу */
        foreach ($data['specialCircumstancesForEdit'] as $specialCircumstance) {
            $specialCircumstances[$specialCircumstance->name] = $specialCircumstance->pivot->status;
        }

        $templateProcessor->setValues([

            'student_id' => $data['student']->id,
            'student_name' => $data['student']->name,
            'student_surname' => $data['student']->surname,
            'student_patronymic' => $data['student']->patronymic ?: '',
            'student_phone' => $data['student']->phone ?: '',
            'student_language' => $data['student']->language->name,
            'student_about_me' => $data['student']->about_me ?: '',

            'passport_birthday' => date('d.m.Y', strtotime($data['passport']->birthday)),
            'passport_birthplace' => $data['passport']->birthplace,
            'passport_number' => $data['passport']->number,
            'passport_nationality' => $data['passport']->nationality->name,
            'passport_issue_by' => $data['passport']->issue_by,
            'passport_issue_date' => date('d.m.Y', strtotime($data['passport']->issue_date)),
            'passport_address_registered' => $data['passport']->address_registered,
            'passport_address_residential' => $data['passport']->address_residential,

            'educational_ed_institution_type' => $data['educational']->educationalInstitutionType->name,
            'educational_ed_doc_type' => $data['educational']->educationalDocType->name,
            'educational_ed_doc_number' => $data['educational']->ed_doc_number,
            'educational_ed_institution_name' => $data['educational']->ed_institution_name,
            'educational_is_first_spo' => $data['educational']->is_first_spo ? 'Да' : 'Нет',
            'educational_is_excellent_student' => $data['educational']->is_excellent_student ? 'Да' : 'Нет',
            'educational_avg_rating' => $data['educational']->avg_rating,
            'educational_issue_date' => date('Y', strtotime($data['educational']->issue_date)),

            'seniority_place_work' => $data['seniority']->place_work ?: '',
            'seniority_profession' => $data['seniority']->profession ?: '',
            'seniority_years' => $data['seniority']->years ? "{$data['seniority']->years} лет" : '',
            'seniority_months' => $data['seniority']->months ? "{$data['seniority']->months} месяцев" : '',

            'students_father_name' => $data['studentsParentFather']->name ?: '',
            'students_father_surname' => $data['studentsParentFather']->surname ?: '',
            'students_father_patronymic' => $data['studentsParentFather']->patronymic ?: '',
            'students_father_phone' => $data['studentsParentFather']->phone ?: '',

            'students_mother_name' => $data['studentsParentMother']->name ?: '',
            'students_mother_surname' => $data['studentsParentMother']->surname ?: '',
            'students_mother_patronymic' => $data['studentsParentMother']->patronymic ?: '',
            'students_mother_phone' => $data['studentsParentMother']->phone ?: '',

            'faculties' => join(', ', $faculties),
            'faculty_with_original_docs' => $facultyWithOriginalDocs ?: 'Отсутствуют',
            'is_original_docs' => $facultyWithOriginalDocs ? 'оригинал' : 'копия',

            'special_circumstances_dormitory' => $specialCircumstances['Общежитие'] ? 'Да' : 'Нет',
            'special_circumstances_disability' => $specialCircumstances['Инвалидность'] ? 'Да' : 'Нет',
            'special_circumstances_spec_conditions' => $specialCircumstances['Специальные условия'] ? 'Да' : 'Нет',

            'current_date' => date('d.m.Y'),
        ]);

        $fileName = $data['student']->surname . ' ' . $data['student']->name;
        $templateProcessor->saveAs($fileName . '.docx');

        return $fileName;
    }

    /**
     * [Method description].
     *
     * @param
     * @return
     */
    public function exportPersonalFileToWord()
    {
        //
    }

    /**
     * [Method description].
     *
     * @param string $text
     * @return object
     */
    /*public function phpWordMakeTextBold($text)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $fontStyle = new Font();
        $fontStyle->setBold(true);

        $myTextElement = $section->addText($text);

        $myTextElement->setFontStyle($fontStyle);

        return $myTextElement;
    }*/
}

<?php

namespace App\Facades;

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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class PersonalFileFacade
{
    protected $nationality;
    protected $faculty;
    protected $financing;
    protected $edInstitutionType;
    protected $language;
    protected $edDocType;
    protected $specialCircumstance;
    protected $decree;
    protected $passport;
    protected $student;
    protected $educational;
    protected $seniority;
    protected $studentsParentFather;
    protected $studentsParentMother;
    protected $enrollment;

    public function __construct
    (
        Nationality $nationality = null,
        Faculty $faculty = null,
        FinancingType $financing = null,
        EducationalInstitutionType $edInstitutionType = null,
        Language $language = null,
        EducationalDocType $edDocType = null,
        SpecialCircumstance $specialCircumstance = null,
        Decree $decree = null,
        Passport $passport = null,
        Student $student = null,
        Educational $educational = null,
        Seniority $seniority = null,
        StudentsParentFather $studentsParentFather = null,
        StudentsParentMother $studentsParentMother = null,
        Enrollment $enrollment = null,
    )
    {
        $this->nationality = $nationality ?: new Nationality();
        $this->faculty = $faculty ?: new Faculty();
        $this->financing = $financing ?: new FinancingType();
        $this->edInstitutionType = $edInstitutionType ?: new EducationalInstitutionType();
        $this->language = $language ?: new Language();
        $this->edDocType = $edDocType ?: new EducationalDocType();
        $this->specialCircumstance = $specialCircumstance ?: new SpecialCircumstance();
        $this->decree = $decree ?: new Decree();
        $this->passport = $passport ?: new Passport();
        $this->student = $student ?: new Student();
        $this->educational = $educational ?: new Educational();
        $this->seniority = $seniority ?: new Seniority();
        $this->studentsParentFather = $studentsParentFather ?: new StudentsParentFather();
        $this->studentsParentMother = $studentsParentMother ?: new StudentsParentMother();
        $this->enrollment = $enrollment ?: new Enrollment();
    }

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
    public function create()
    {
        return ['lists' => $this->getLists()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $validatedData
     * @return string
     */
    public function store($validatedData)
    {
        //dd($validatedData);
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
     * @param int $id
     * @return array
     */
    public function show($id)
    {
        return [
            'lists' => $this->getLists(),
            'student' => $this->getStudentWithRelatedModels($id),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return array
     */
    public function edit($id)
    {
        return [
            'lists' => $this->getLists(),
            'student' => $this->getStudentWithRelatedModels($id),
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $validatedData
     * @param int $id
     * @return string
     */
    public function update($validatedData, $id)
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
     * @return string|void
     */
    public function destroy($id)
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
    public function getLists()
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
     * @return array
     */
    public function getStudentWithRelatedModels($id)
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
     * @param array $validatedData
     * @return string|Model
     */
    public function find($validatedData)
    {
        $passport = $this->passport->find($validatedData);

        if (!is_null($passport)) {
            return $passport->student;
        }

        return '';
    }
}

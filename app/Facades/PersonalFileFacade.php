<?php

namespace App\Facades;

use App\Queries\DecreeQueryBuilder;
use App\Queries\EdDocTypeQueryBuilder;
use App\Queries\EdInstitutionTypeQueryBuilder;
use App\Queries\EducationalQueryBuilder;
use App\Queries\EnrollmentQueryBuilder;
use App\Queries\FacultyQueryBuilder;
use App\Queries\FinancingQueryBuilder;
use App\Queries\LanguageQueryBuilder;
use App\Queries\NationalityQueryBuilder;
use App\Queries\PassportQueryBuilder;
use App\Queries\SeniorityQueryBuilder;
use App\Queries\SpecialCircumstanceQueryBuilder;
use App\Queries\StParentFatherQueryBuilder;
use App\Queries\StParentMotherQueryBuilder;
use App\Queries\StudentQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PersonalFileFacade
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

    public function __construct(
        NationalityQueryBuilder $nationality = null,
        FacultyQueryBuilder $faculty = null,
        FinancingQueryBuilder $financing = null,
        EdInstitutionTypeQueryBuilder $edInstitutionType = null,
        LanguageQueryBuilder $language = null,
        EdDocTypeQueryBuilder $edDocType = null,
        SpecialCircumstanceQueryBuilder $specialCircumstance = null,
        DecreeQueryBuilder $decree = null,
        PassportQueryBuilder $passport = null,
        StudentQueryBuilder $student = null,
        EducationalQueryBuilder $educational = null,
        SeniorityQueryBuilder $seniority = null,
        StParentFatherQueryBuilder $studentsParentFather = null,
        StParentMotherQueryBuilder $studentsParentMother = null,
        EnrollmentQueryBuilder $enrollment = null,
    )
    {
        $this->nationality = $nationality ?: new NationalityQueryBuilder();
        $this->faculty = $faculty ?: new FacultyQueryBuilder();
        $this->financing = $financing ?: new FinancingQueryBuilder();
        $this->edInstitutionType = $edInstitutionType ?: new EdInstitutionTypeQueryBuilder();
        $this->language = $language ?: new LanguageQueryBuilder();
        $this->edDocType = $edDocType ?: new EdDocTypeQueryBuilder();
        $this->specialCircumstance = $specialCircumstance ?: new SpecialCircumstanceQueryBuilder();
        $this->decree = $decree ?: new DecreeQueryBuilder();
        $this->passport = $passport ?: new PassportQueryBuilder();
        $this->student = $student ?: new StudentQueryBuilder();
        $this->educational = $educational ?: new EducationalQueryBuilder();
        $this->seniority = $seniority ?: new SeniorityQueryBuilder();
        $this->studentsParentFather = $studentsParentFather ?: new StParentFatherQueryBuilder();
        $this->studentsParentMother = $studentsParentMother ?: new StParentMotherQueryBuilder();
        $this->enrollment = $enrollment ?: new EnrollmentQueryBuilder();
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): array
    {
        return $this->getSecondaryModels();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!empty($this->passport->getModel($request->passportNumber, 'number'))) {
            return collect();
        }

        $this->passport = $this->passport->create($request);
        $this->student = $this->student->create($request, $this->passport);
        $this->educational = $this->educational->create($request, $this->student);
        $this->seniority = $this->seniority->create($request, $this->student);
        $this->studentsParentFather = $this->studentsParentFather->create($request, $this->student);
        $this->studentsParentMother = $this->studentsParentMother->create($request, $this->student);
        $this->enrollment = $this->enrollment->create($request, $this->student);

        $admissionInfo = $request->data;

        foreach ($admissionInfo as $blockName => $blockContent) {
            $this->student->faculties()->attach($blockContent['faculty_id'], [
                    'student_id' => $this->student->id,
                    'financing_type_id' => $blockContent['financing_type_id'],
                    'is_original_docs' => $blockContent['is_original_docs'],
                ]
            );
        }

        $specialCircumstance = $request->circumstance;

        foreach ($specialCircumstance as $circumstanceId => $circumstanceValue) {
            $this->student->specialCircumstances()->attach($circumstanceId, [
                    'student_id' => $this->student->id,
                    'status' => $circumstanceValue,
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(): array
    {
        return $this->getSecondaryModels();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->student->getModel($id);

        if (is_null($student)) {
            return null;
        }

        $facultiesBlocks = [];
        $counterFacultiesBlocks = 1;

        foreach ($student->faculties as $faculty) {
            $facultiesBlocks['block_' . $counterFacultiesBlocks] = $faculty->pivot->getAttributes();
            $counterFacultiesBlocks++;
        }

        return $primaryModels = [
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
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function search()
    {
        //
    }

    public function find(Request $request)
    {
        if (empty($request->input('search'))) {
            return null;
        }

        $passport = $this->passport->find($request);

        if (!is_null($passport)) {
            return $passport->student;
        }

        return '';
    }

    public function getSecondaryModels(): array
    {
        return $secondaryModels = [
            'nationality' => $this->nationality->getModels(),
            'faculties' => $this->faculty->getModels(),
            'financing' => $this->financing->getModels(),
            'educationalInstitutionTypes' => $this->edInstitutionType->getModels(),
            'languages' => $this->language->getModels(),
            'educationalDocTypes' => $this->edDocType->getModels(),
            'specialCircumstances' => $this->specialCircumstance->getModels(),
            'decrees' => $this->decree->getModels(),
        ];
    }
}

<?php

namespace App\Facades;

use App\Models\Admin\Category;
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

abstract class Facade
{
    protected object $category;
    protected object $nationality;
    protected object $faculty;
    protected object $financing;
    protected object $edInstitutionType;
    protected object $language;
    protected object $edDocType;
    protected object $specialCircumstance;
    protected object $decree;
    protected object $passport;
    protected object $student;
    protected object $educational;
    protected object $seniority;
    protected object $studentsParentFather;
    protected object $studentsParentMother;
    protected object $enrollment;

    public function __construct
    (
        Category                   $category = null,
        Nationality                $nationality = null,
        Faculty                    $faculty = null,
        FinancingType              $financing = null,
        EducationalInstitutionType $edInstitutionType = null,
        Language                   $language = null,
        EducationalDocType         $edDocType = null,
        SpecialCircumstance        $specialCircumstance = null,
        Decree                     $decree = null,
        Passport                   $passport = null,
        Student                    $student = null,
        Educational                $educational = null,
        Seniority                  $seniority = null,
        StudentsParentFather       $studentsParentFather = null,
        StudentsParentMother       $studentsParentMother = null,
        Enrollment                 $enrollment = null,
    )
    {
        $this->category = $category ?: new Category();
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
    abstract public function index();

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    abstract public function create();

    /**
     * Store a newly created resource in storage.
     *
     * @param array $validatedData
     * @return string
     */
    abstract public function store(array $validatedData);//: string;

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return array
     */
    abstract public function show(Request $request, int $id): array;

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return array
     */
    abstract public function edit(int $id);//: array;

    /**
     * Update the specified resource in storage.
     *
     * @param array $validatedData
     * @param int $id
     * @return null|object
     */
    abstract public function update(array $validatedData, int $id);//: string;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return null|string
     */
    abstract public function destroy(int $id);//: null|string;
}

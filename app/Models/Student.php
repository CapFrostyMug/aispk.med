<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'passport_id',
        'phone',
        'email',
        'language_id',
        'about_me',
    ];

    public function passport()
    {
        return $this->belongsTo(
            Passport::class,
            'passport_id',
            'id'
        );
    }

    public function language()
    {
        return $this->belongsTo(
            Language::class,
            'language_id',
            'id'
        );
    }

    public function educational()
    {
        return $this->hasOne(
            Educational::class,
            'student_id',
            'id'
        );
    }

    public function seniority()
    {
        return $this->hasOne(
            Seniority::class,
            'student_id',
            'id'
        );
    }

    public function studentsParentFather()
    {
        return $this->hasOne(
            StudentsParentFather::class,
            'student_id',
            'id'
        );
    }

    public function studentsParentMother()
    {
        return $this->hasOne(
            StudentsParentMother::class,
            'student_id',
            'id'
        );
    }

    public function specialCircumstances()
    {
        return $this->belongsToMany(
            SpecialCircumstance::class,
            'student_special_circumstance',
            'student_id',
            'special_circumstance_id'
        )->withPivot('status');
    }

    public function faculties()
    {
        return $this->belongsToMany(
            Faculty::class,
            'information_for_admission',
            'student_id',
            'faculty_id'
        )->withPivot('is_original_docs', 'financing_type_id');
    }

    public function financingTypes()
    {
        return $this->belongsToMany(
            FinancingType::class,
            'information_for_admission',
            'student_id',
            'financing_type_id'
        )->withPivot('is_original_docs', 'faculty_id');
    }

    public function enrollment()
    {
        return $this->hasOne(
            Enrollment::class,
            'student_id',
            'id'
        );
    }

    public function updateInformationForAdmissionTable($validatedData, $student)
    {
        $student = $this->find($student->id);

        $student->faculties()->detach();

        $admissionInfo = $validatedData['data'];

        foreach ($admissionInfo as $blockName => $blockContent) {
            $student->faculties()->attach($blockContent['faculty_id'], [
                    'student_id' => $student->id,
                    'financing_type_id' => $blockContent['financing_type_id'],
                    'is_original_docs' => $blockContent['is_original_docs'],
                ]
            );
        }
    }

    public function updateStudentSpecialCircumstanceTable($validatedData, $student)
    {
        $student = $this->find($student->id);

        $student->specialCircumstances()->detach();

        $specialCircumstance = $validatedData['circumstance'];

        foreach ($specialCircumstance as $circumstanceId => $circumstanceValue) {
            $student->specialCircumstances()->attach($circumstanceId, [
                    'student_id' => $student->id,
                    'status' => $circumstanceValue,
                ]
            );
        }
    }

    public function scopeFilterByFaculties(Builder $query, $type)
    {
        return $query->where('faculties.id', '=', $type['faculty']);
    }

    public function scopeFilterByFinancingTypes(Builder $query, $type)
    {
        $arr = [];

        foreach ($type['financingType'] as $key => $value) {
            $arr[] = $value;
        }
        return $query->whereIn('financing_types.id', $arr)->groupBy('students.id');
    }

    public function scopeFilterByEnrollmentStatus(Builder $query, $type)
    {
        if (count($type['studentStatus']) > 1) {
            return $query
                ->groupBy('students.id');
        }

        foreach ($type['studentStatus'] as $key => $value) {

            if ($type['faculty']) {
                if ($value) {
                    return $query
                        ->whereNotNull('enrollment.decree_id')
                        ->where('enrollment.faculty_id', '=', $type['faculty'])
                        ->groupBy('students.id');
                }

                return $query
                    ->whereNull('enrollment.decree_id')
                    ->orWhere('enrollment.faculty_id', '!=', $type['faculty'])
                    ->groupBy('students.id');
            }

            if ($value) {
                return $query
                    ->whereNotNull('enrollment.decree_id')
                    ->groupBy('students.id');
            }

            return $query
                ->whereNull('enrollment.decree_id')
                ->groupBy('students.id');
        }
    }

    public function scopeFilterByOriginalDocs(Builder $query, $type)
    {
        if (count($type['docsType']) > 1) {
            return $query
                ->groupBy('students.id');
        }

        foreach ($type['docsType'] as $key => $value) {
            return $query
                ->where('information_for_admission.is_original_docs', '=', $value);
        }
    }
}

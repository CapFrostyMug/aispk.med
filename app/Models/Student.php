<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        );
    }

    public function faculties()
    {
        return $this->belongsToMany(
            Faculty::class,
            'information_for_admission',
            'student_id',
            'faculty_id'
        )->withPivot('is_original_docs');
    }

    public function financingTypes()
    {
        return $this->belongsToMany(
            FinancingType::class,
            'information_for_admission',
            'student_id',
            'financing_type_id'
        )->withPivot('is_original_docs');
    }

    public function enrollment()
    {
        return $this->hasOne(
            Enrollment::class,
            'student_id',
            'id'
        );
    }
}

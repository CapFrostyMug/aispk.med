<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = 'faculties';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'information_for_admission',
            'faculty_id',
            'student_id'
        )->withPivot('is_original_docs', 'financing_type_id', 'testing');
    }

    public function financingTypes()
    {
        return $this->belongsToMany(
            FinancingType::class,
            'information_for_admission',
            'faculty_id',
            'financing_type_id'
        )->withPivot('is_original_docs', 'faculty_id', 'testing');
    }

    public function enrollment()
    {
        return $this->hasMany(
            Enrollment::class,
            'faculty_id',
            'id'
        );
    }
}

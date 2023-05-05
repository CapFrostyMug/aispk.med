<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInstitutionType extends Model
{
    use HasFactory;

    protected $table = 'educational_institution_types';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}

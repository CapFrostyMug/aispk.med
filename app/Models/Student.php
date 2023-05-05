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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;

    protected $table = 'passports';

    public $timestamps = false;

    protected $fillable = [
        'birthday',
        'birthplace',
        'number',
        'gender',
        'nationality_id',
        'issue_by',
        'issue_date',
        'address_registered',
        'address_residential',
    ];

    public function student()
    {
        return $this->hasOne(
            Student::class,
            'passport_id',
            'id'
        );
    }

    public function nationality()
    {
        return $this->belongsTo(
            Nationality::class,
            'nationality_id',
            'id'
        );
    }

    public function find($validatedData)
    {
        if (!isset($validatedData['search'])) {
            return null;
        }

        $search = $validatedData['search'];

        $search = iconv_substr($search, 0, 20);
        $search = preg_replace('#[^0-9a-zA-ZА]#u', '', $search);
        $search = preg_replace('#\s+#u', '', $search);
        $search = strtoupper($search);

        $passport = $this::firstWhere('number', $search);

        if (is_null($passport)) {
            return null;
        }

        return $passport;
    }
}

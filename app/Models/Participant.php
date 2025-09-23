<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_initial',
        'last_name',
        'name_extension',
        'email',
        'mobile_no',
        'sex',
        'age_group',
        'civil_status',
        'nationality',
        'highest_educational_attainment',
        'sector_group',
        'senior_citizen',
        'differently_abled',
        'solo_parent',
        'region',
        'province',
        'city_municipality',
        'agency',
        'office_affiliation',
        'designation',
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}

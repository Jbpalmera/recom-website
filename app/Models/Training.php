<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'course_description',
        'platform_used',
        'category',
        'level',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'resource_person',
    ];


    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}

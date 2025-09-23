<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'platform_used',
        'start_date',
        'end_date',
        'resource_person',
    ];


    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}

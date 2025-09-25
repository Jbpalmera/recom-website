<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_initial',
        'last_name',
        'name_extension',
        'email',
        'mobile_no',
        'course_title',
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}

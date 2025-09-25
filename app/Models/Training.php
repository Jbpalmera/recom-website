<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'course_title',
        'course_description',
        'platform_used',
        'category_id',
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
 public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}

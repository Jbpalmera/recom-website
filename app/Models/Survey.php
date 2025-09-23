<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'user_id',

        // Course Preferences
        'web_development','mobile_development','data_science','cybersecurity',
        'ai_machine_learning','digital_marketing','cloud_computing','ui_ux_design',

        'primary_goal','course_type',
        'frequency','preferred_time','course_duration',

        // Learning Formats
        'learning_format_online_live','learning_format_online_recorded',
        'learning_format_face_to_face','learning_format_hybrid',
        'learning_format_workshop','learning_format_bootcamp',

        // Hobbies
        'hobby_gaming','hobby_photography','hobby_reading','hobby_music',
        'hobby_sports','hobby_traveling','hobby_cooking','hobby_art_design',
        'hobby_writing',

        'additional_comments','newsletter'
    ];
}




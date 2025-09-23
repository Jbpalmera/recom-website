<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
class SurveyController extends Controller
{
    // Show the survey form
    public function create()
{
    return view('survey');
}


    // Handle survey submission
  public function store(Request $request)
{
    Survey::create([
        'user_id' => auth()->id(),
        // ✅ Course Preferences
        'web_development' => $request->has('web_development'),
        'mobile_development' => $request->has('mobile_development'),
        'data_science' => $request->has('data_science'),
        'cybersecurity' => $request->has('cybersecurity'),
        'ai_machine_learning' => $request->has('ai_machine_learning'),
        'digital_marketing' => $request->has('digital_marketing'),
        'cloud_computing' => $request->has('cloud_computing'),
        'ui_ux_design' => $request->has('ui_ux_design'),

        // ✅ Single-selects
        'primary_goal' => $request->primary_goal,
        'course_type' => $request->course_type,

        // ✅ Learning Preferences
        'frequency' => $request->frequency,
        'preferred_time' => $request->preferred_time,
        'course_duration' => $request->course_duration,

        // Flattened Learning Format
        'learning_format_online_live' => $request->has('learning_format') && in_array('online_live', $request->learning_format),
        'learning_format_online_recorded' => $request->has('learning_format') && in_array('online_recorded', $request->learning_format),
        'learning_format_face_to_face' => $request->has('learning_format') && in_array('face_to_face', $request->learning_format),
        'learning_format_hybrid' => $request->has('learning_format') && in_array('hybrid', $request->learning_format),
        'learning_format_workshop' => $request->has('learning_format') && in_array('workshop', $request->learning_format),
        'learning_format_bootcamp' => $request->has('learning_format') && in_array('bootcamp', $request->learning_format),

        // ✅ Hobbies (flattened)
        'hobby_gaming' => $request->has('hobbies') && in_array('gaming', $request->hobbies),
        'hobby_photography' => $request->has('hobbies') && in_array('photography', $request->hobbies),
        'hobby_reading' => $request->has('hobbies') && in_array('reading', $request->hobbies),
        'hobby_music' => $request->has('hobbies') && in_array('music', $request->hobbies),
        'hobby_sports' => $request->has('hobbies') && in_array('sports', $request->hobbies),
        'hobby_traveling' => $request->has('hobbies') && in_array('traveling', $request->hobbies),
        'hobby_cooking' => $request->has('hobbies') && in_array('cooking', $request->hobbies),
        'hobby_art_design' => $request->has('hobbies') && in_array('art_design', $request->hobbies),
        'hobby_writing' => $request->has('hobbies') && in_array('writing', $request->hobbies),

        // ✅ Extra
        'additional_comments' => $request->additional_comments,
        'newsletter' => $request->has('newsletter'),
    ]);

    return redirect()->route('dashboard')->with('success', 'Survey submitted successfully!');
}

}

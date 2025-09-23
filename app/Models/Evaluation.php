<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'training_id',
        // ratings
        'relevance_current_work',
        'relevance_future_work',
        'relevance_institution_needs',
        'info_amount',
        'info_usefulness',
        'info_new_skills',
        'info_objectives_achieved',
        'design_interest',
        'design_visual_aids',
        'design_time_allotment',
        'design_topic_sequence',
        'design_discussion_time',
        'design_method_variety',
        'interaction_effectiveness',
        'interaction_responsiveness',
        'interaction_quality',
        'staff_assistance',
        'overall_rating',
        // instructor qualities
        'mastery_knowledge',
        'mastery_organization',
        'mastery_current_dev',
        'mastery_notes',
        'methodology_clarity',
        'methodology_assignments',
        'methodology_materials',
        'methodology_questions',
        'methodology_time_efficiency',
        'communication_voice',
        'communication_expression',
        'management_inspiration',
        'management_helpfulness',
        'management_openness',
        'management_discipline',
        'qualities_punctuality',
        'qualities_attire',
        'qualities_courteous',
        'qualities_authority',
        // feedback
        'useful_aspects',
        'least_useful_aspects',
        'more_time_topics',
        'less_time_topics',
        'improvement_advice',
        'recommend_course',
        'things_to_do_after',
        'other_comments',
        'impact_on_functions',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}

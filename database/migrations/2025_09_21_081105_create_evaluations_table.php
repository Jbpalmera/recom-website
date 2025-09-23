<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained('participants')->onDelete('cascade');
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');

            // Ratings
            $table->tinyInteger('relevance_current_work')->nullable();
            $table->tinyInteger('relevance_future_work')->nullable();
            $table->tinyInteger('relevance_institution_needs')->nullable();
            $table->tinyInteger('info_amount')->nullable();
            $table->tinyInteger('info_usefulness')->nullable();
            $table->tinyInteger('info_new_skills')->nullable();
            $table->tinyInteger('info_objectives_achieved')->nullable();
            $table->tinyInteger('design_interest')->nullable();
            $table->tinyInteger('design_visual_aids')->nullable();
            $table->tinyInteger('design_time_allotment')->nullable();
            $table->tinyInteger('design_topic_sequence')->nullable();
            $table->tinyInteger('design_discussion_time')->nullable();
            $table->tinyInteger('design_method_variety')->nullable();
            $table->tinyInteger('interaction_effectiveness')->nullable();
            $table->tinyInteger('interaction_responsiveness')->nullable();
            $table->tinyInteger('interaction_quality')->nullable();
            $table->tinyInteger('staff_assistance')->nullable();
            $table->tinyInteger('overall_rating')->nullable();

            // Instructor qualities
            $table->tinyInteger('mastery_knowledge')->nullable();
            $table->tinyInteger('mastery_organization')->nullable();
            $table->tinyInteger('mastery_current_dev')->nullable();
            $table->tinyInteger('mastery_notes')->nullable();
            $table->tinyInteger('methodology_clarity')->nullable();
            $table->tinyInteger('methodology_assignments')->nullable();
            $table->tinyInteger('methodology_materials')->nullable();
            $table->tinyInteger('methodology_questions')->nullable();
            $table->tinyInteger('methodology_time_efficiency')->nullable();
            $table->tinyInteger('communication_voice')->nullable();
            $table->tinyInteger('communication_expression')->nullable();
            $table->tinyInteger('management_inspiration')->nullable();
            $table->tinyInteger('management_helpfulness')->nullable();
            $table->tinyInteger('management_openness')->nullable();
            $table->tinyInteger('management_discipline')->nullable();
            $table->tinyInteger('qualities_punctuality')->nullable();
            $table->tinyInteger('qualities_attire')->nullable();
            $table->tinyInteger('qualities_courteous')->nullable();
            $table->tinyInteger('qualities_authority')->nullable();

            // Open feedback
            $table->text('useful_aspects')->nullable();
            $table->text('least_useful_aspects')->nullable();
            $table->text('more_time_topics')->nullable();
            $table->text('less_time_topics')->nullable();
            $table->text('improvement_advice')->nullable();
            $table->boolean('recommend_course')->default(false);
            $table->text('things_to_do_after')->nullable();
            $table->text('other_comments')->nullable();
            $table->text('impact_on_functions')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

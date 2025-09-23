<?php

namespace App\Imports;

use App\Models\Evaluation;
use App\Models\Participant;
use App\Models\Training;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EventEvaluationImport implements ToModel, WithHeadingRow
{
    private function toBoolean($value)
    {
        return match (strtolower(trim((string) $value))) {
            'yes', 'y', 'true', '1' => true,
            'no', 'n', 'false', '0' => false,
            default => null,
        };
    }

    public function prepareForValidation($row, $index)
    {
        $normalized = [];

        foreach ($row as $key => $value) {
            $cleanKey = strtolower(trim($key));
            $cleanKey = preg_replace('/[^a-zA-Z0-9]+/', '_', $cleanKey);
            $cleanKey = trim($cleanKey, '_');

            $normalized[$cleanKey] = $value;
        }

        return $normalized;
    }

    public function model(array $row)
    {
        // Normalize headers first
        $row = $this->prepareForValidation($row, 0);

        // Convert Excel serial date for end_date if numeric
        $endDate = $row['training_end_date'] ?? null;
        if (is_numeric($endDate)) {
            $endDate = Carbon::instance(Date::excelToDateTimeObject($endDate));
        }

        // 1. Create or get participant
        $participant = Participant::firstOrCreate(
            ['email' => $row['email_address']],
            [
                'first_name' => $row['first_name'],
                'middle_initial' => $row['middle_initial'],
                'last_name' => $row['last_name'],
                'name_extension' => $row['name_extension'] ?? null,
                'mobile_no' => $row['mobile_no'],
                'sex' => $row['sex'],
                'age_group' => $row['age_group'],
                'civil_status' => $row['civil_status'],
                'nationality' => $row['nationality'],
                'highest_educational_attainment' => $row['highest_educational_attainment'],
                'sector_group' => $row['sectorgroup_put_check_on_checkboxes_if_applicable'],
                'senior_citizen' => $this->toBoolean($row['are_you_a_senior_citizen'] ?? null),
                'differently_abled' => $this->toBoolean($row['are_you_differently_abled'] ?? null),
                'solo_parent' => $this->toBoolean($row['are_you_a_solo_parent'] ?? null),
                'region' => $row['region'],
                'province' => $row['province'],
                'city_municipality' => $row['city_municipality'],
                'agency' => $row['agency'],
                'office_affiliation' => $row['officeorganizational_affiliation'],
                'designation' => $row['designationposition'],
            ]
        );

        // 2. Create training (always insert a new row)
        $courseTitle = trim($row['course_title'] ?? '');
        if ($courseTitle === '') {
            $courseTitle = 'Untitled Training';
        }

        $training = Training::create([
            'course_title' => $courseTitle,
            'platform_used' => $row['platform_used'] ?? null,
            'end_date' => $endDate,
            'resource_person' => $row['name_of_the_resource_person'] ?? null,
        ]);

        // 3. Create evaluation
        return new Evaluation([
            'participant_id' => $participant->id,
            'training_id' => $training->id,

            // Relevance
            'relevance_current_work' => $row['relevance_of_the_training_relevance_to_your_current_work'],
            'relevance_future_work' => $row['relevance_of_the_training_relevance_to_your_future_desired_work'],
            'relevance_institution_needs' => $row['relevance_of_the_training_relevance_to_your_institutions_agencys_needs'],

            // Info/Skills
            'info_amount' => $row['informationskills_acquired_amount_of_information_covered_in_the_course_training_seminar'],
            'info_usefulness' => $row['informationskills_acquired_extent_to_which_you_gained_ideas_useful_to_you_work'],
            'info_new_skills' => $row['informationskills_acquired_extent_to_which_you_have_acquired_new_skills'],
            'info_objectives_achieved' => $row['informationskills_acquired_extent_that_this_course_training_seminar_achieved_its_objectives'],

            // Instructional design
            'design_interest' => $row['instructional_design_effectiveness_of_the_course_training_seminar_in_maintaining_your_interest_from_start_to_finish'],
            'design_visual_aids' => $row['instructional_design_effectiveness_of_the_visual_aids_in_reinforcing_the_lessons'],
            'design_time_allotment' => $row['instructional_design_adequacy_of_time_alloted_to_each_topics'],
            'design_topic_sequence' => $row['instructional_design_logic_in_the_progression_or_sequence_of_topics'],
            'design_discussion_time' => $row['instructional_design_time_allotted_for_discussions_and_q_and_a'],
            'design_method_variety' => $row['instructional_design_variety_of_the_training_methods_used_lectures_exercises_discussion_examination_assessment'],

            // Class interaction
            'interaction_effectiveness' => $row['class_interaction_effectiveness_of_the_resource_person_instructor_in_training_you_to_use_and_appreciate_application'],
            'interaction_responsiveness' => $row['class_interaction_responsiveness_of_the_resource_person_instructor_in_answering_participants_questions_queries'],
            'interaction_quality' => $row['class_interaction_interaction_between_participants_and_resource_person_instructor'],
            'staff_assistance' => $row['sensitivity_and_assistance_provided_by_the_training_staff'],
            'overall_rating' => $row['in_general_how_would_you_rate_this_course_training_seminar'],

            // Feedback
            'useful_aspects' => $row['what_did_you_find_most_useful_this_course_training_seminar'],
            'least_useful_aspects' => $row['what_did_you_find_least_useful_in_this_course_training_seminar'],
            'more_time_topics' => $row['on_which_topics_if_any_would_you_rather_have_spent_more_time'],
            'less_time_topics' => $row['on_which_topics_if_any_would_you_rather_have_spent_less_time'],
            'improvement_advice' => $row['what_advice_can_you_give_to_improve_the_future_conduct_of_this_course_training_seminar'],
            'recommend_course' => $this->toBoolean($row['could_you_recommend_this_course_training_seminar_to_your_colleagues'] ?? null),

            'things_to_do_after' => $row['please_list_three_3_things_that_you_intend_to_do_as_a_result_of_your_participation_in_this_course_training_seminar'],
            'other_comments' => $row['commentsuggestions'] ?? null,
            'impact_on_functions' => $row['what_is_the_impact_of_the_training_in_relation_to_your_functions_in_the_government_agency_you_belong'],

            // Instructor qualities
            'mastery_knowledge' => $row['mastery_of_the_subject_matter_knowledge_about_the_subject_matter'],
            'mastery_organization' => $row['mastery_of_the_subject_matter_presents_the_topics_in_a_well_organized_manner'],
            'mastery_current_dev' => $row['mastery_of_the_subject_matter_injects_current_developments_relevant_to_the_course_training'],
            'mastery_notes' => $row['mastery_of_the_subject_matter_uses_notes_wisely'],

            'methodology_clarity' => $row['instructional_methodology_able_to_explain_theories_and_concepts_clearly'],
            'methodology_assignments' => $row['instructional_methodology_gives_adequate_exercises_assignments'],
            'methodology_materials' => $row['instructional_methodology_utilizes_instructional_materials_effectively'],
            'methodology_questions' => $row['instructional_methodology_encourages_participants_to_raise_questions'],
            'methodology_time_efficiency' => $row['instructional_methodology_makes_use_of_time_efficiently'],

            'communication_voice' => $row['communication_skills_projects_a_clear_and_audible_voice'],
            'communication_expression' => $row['communication_skills_expresses_his_her_ideas_clearly_fluently_and_spontaneously'],

            'management_inspiration' => $row['classroom_management_able_to_inspire_and_maintain_the_participants_interest'],
            'management_helpfulness' => $row['classroom_management_willingness_to_help_in_the_participants_course_training_related_problems'],
            'management_openness' => $row['classroom_management_open_to_criticism_and_gives_accepts_alternative_solutions_to_problems'],
            'management_discipline' => $row['classroom_management_able_to_maintain_classroom_discipline_and_control'],

            'qualities_punctuality' => $row['personal_qualities_follows_the_time_duration_class_hours'],
            'qualities_attire' => $row['personal_qualities_dresses_neatly_and_appropriately'],
            'qualities_courteous' => $row['personal_qualities_courteous_in_answering_the_participants_questions_queries'],
            'qualities_authority' => $row['personal_qualities_projects_image_of_authority'],
        ]);
    }
}

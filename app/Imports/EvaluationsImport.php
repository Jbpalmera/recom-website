<?php

namespace App\Imports;

use App\Models\Evaluation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EvaluationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Evaluation([
            'participant_id' => $row['participant_id'],
            'training_id'    => $row['training_id'],
            'relevance_current_work' => $row['relevance_current_work'],
            'relevance_future_work' => $row['relevance_future_work'],
            'relevance_institution_needs' => $row['relevance_institution_needs'],
            'info_amount' => $row['info_amount'],
            'info_usefulness' => $row['info_usefulness'],
            'info_new_skills' => $row['info_new_skills'],
            'info_objectives_achieved' => $row['info_objectives_achieved'],
            'impact_on_functions' => $row['impact_on_functions'],
        ]);
    }
}

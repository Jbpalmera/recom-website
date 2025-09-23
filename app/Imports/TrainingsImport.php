<?php

namespace App\Imports;

use App\Models\Training;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrainingsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Training([
            'course_title'   => $row['course_title'],
            'platform_used'  => $row['platform_used'],
            'start_date'     => $row['start_date'],
            'end_date'       => $row['end_date'],
            'resource_person'=> $row['resource_person'],
        ]);
    }
}

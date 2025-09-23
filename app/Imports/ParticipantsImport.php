<?php

namespace App\Imports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ParticipantsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Normalize keys: lowercase + underscores
        $normalizedRow = [];
        foreach ($row as $key => $value) {
            $key = strtolower(trim($key));
            $key = str_replace([' ', '/', '-', '__'], '_', $key);
            $normalizedRow[$key] = $value;
        }

        // Use updateOrCreate to avoid duplicate email errors
        return Participant::updateOrCreate(
            ['email' => $normalizedRow['email_address'] ?? null], // Match by email
            [
                'first_name'   => $normalizedRow['first_name'] ?? null,
                'middle_initial' => $normalizedRow['middle_initial'] ?? null,
                'last_name'    => $normalizedRow['last_name'] ?? null,
                'name_extension' => $normalizedRow['name_extension'] ?? null,
                'mobile_no'    => $normalizedRow['mobile_no'] ?? null,
                'sex'          => $normalizedRow['sex'] ?? null,
                'age_group'    => $normalizedRow['age_group'] ?? null,
                'civil_status' => $normalizedRow['civil_status'] ?? null,
                'nationality'  => $normalizedRow['nationality'] ?? null,
                'highest_educational_attainment' => $normalizedRow['highest_educational_attainment'] ?? null,
                'sector_group' => $normalizedRow['sectorgroup_put_check_on_checkboxes_if_applicable'] ?? null,
                'senior_citizen' => ($normalizedRow['are_you_a_senior_citizen'] ?? '') === 'Yes',
                'differently_abled' => ($normalizedRow['are_you_differently_abled'] ?? '') === 'Yes',
                'solo_parent' => ($normalizedRow['are_you_a_solo_parent'] ?? '') === 'Yes',
                'region'       => $normalizedRow['region'] ?? null,
                'province'     => $normalizedRow['province'] ?? null,
                'city_municipality' => $normalizedRow['city_municipality'] ?? null,
                'agency'       => $normalizedRow['agency'] ?? null,
                'office_affiliation' => $normalizedRow['officeorganizational_affiliation'] ?? null,
                'designation'  => $normalizedRow['designationposition'] ?? null,
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'Juan',
                'middle_initial' => 'D',
                'last_name' => 'Cruz',
                'name_extension' => 'Jr.',
                'gender' => 'Male',
                'age_group' => '18-25',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'highest_educational_background' => 'Bachelor’s Degree',
                'sector_group' => 'IT',
                'senior_citizen' => false,
                'differently_abled' => false,
                'solo_parent' => false,
                'region' => 'NCR',
                'province' => 'Metro Manila',
                'city_municipality' => 'Quezon City',
                'agency' => 'DICT',
                'office_affiliation' => 'Main Office',
                'designation' => 'Developer',
                'username' => 'juan123',
                'email' => 'user1@example.com',
            ],
            [
                'first_name' => 'Maria',
                'middle_initial' => 'L',
                'last_name' => 'Santos',
                'name_extension' => null,
                'gender' => 'Female',
                'age_group' => '26-35',
                'civil_status' => 'Married',
                'nationality' => 'Filipino',
                'highest_educational_background' => 'Master’s Degree',
                'sector_group' => 'Education',
                'senior_citizen' => false,
                'differently_abled' => true,
                'solo_parent' => true,
                'region' => 'Region IV-A',
                'province' => 'Laguna',
                'city_municipality' => 'Calamba',
                'agency' => 'DepEd',
                'office_affiliation' => 'Regional Office',
                'designation' => 'Teacher',
                'username' => 'maria123',
                'email' => 'user2@example.com',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'first_name' => $user['first_name'],
                    'middle_initial' => $user['middle_initial'],
                    'last_name' => $user['last_name'],
                    'name_extension' => $user['name_extension'],
                    'gender' => $user['gender'],
                    'age_group' => $user['age_group'],
                    'civil_status' => $user['civil_status'],
                    'nationality' => $user['nationality'],
                    'highest_educational_background' => $user['highest_educational_background'],
                    'sector_group' => $user['sector_group'],
                    'senior_citizen' => $user['senior_citizen'],
                    'differently_abled' => $user['differently_abled'],
                    'solo_parent' => $user['solo_parent'],
                    'region' => $user['region'],
                    'province' => $user['province'],
                    'city_municipality' => $user['city_municipality'],
                    'agency' => $user['agency'],
                    'office_affiliation' => $user['office_affiliation'],
                    'designation' => $user['designation'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'last_login_at' => now(),
                ]
            );
        }
    }
}

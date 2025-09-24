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
                'username' => 'juan123',
                'email' => 'user1@example.com',
            ],
            [
                'first_name' => 'Maria',
                'username' => 'maria123',
                'email' => 'user2@example.com',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'first_name' => $user['first_name'],
                    'username' => $user['username'],
                    'password' => Hash::make('password123'), // same password for both
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'middle_initial' => null,
                    'last_name' => null,
                    'name_extension' => null,
                    'gender' => null,
                    'age_group' => null,
                    'civil_status' => null,
                    'nationality' => null,
                    'highest_educational_background' => null,
                    'sector_group' => null,
                    'senior_citizen' => false,
                    'differently_abled' => false,
                    'solo_parent' => false,
                    'region' => null,
                    'province' => null,
                    'city_municipality' => null,
                    'agency' => null,
                    'office_affiliation' => null,
                    'designation' => null,
                    'last_login_at' => null,
                ]
            );
        }
    }
}

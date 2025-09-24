<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;
use Carbon\Carbon;

class TrainingSeeder extends Seeder
{
    public function run()
    {
        $trainings = [
            [
                'course_title'       => 'Intro to AI for Beginners',
                'course_description' => 'Learn the basics of AI and machine learning.',
                'platform_used'      => 'Zoom',
                'category'           => 'Technology',
                'level'              => 'Beginner',
                'start_date'         => Carbon::now()->addDays(2),
                'end_date'           => Carbon::now()->addDays(5),
                'start_time'         => '09:00:00',
                'end_time'           => '12:00:00',
                'resource_person'    => 'John Doe',
            ],
            [
                'course_title'       => 'Advanced Web Development',
                'course_description' => 'Build full-stack apps with Laravel and Vue.js.',
                'platform_used'      => 'Google Meet',
                'category'           => 'Programming',
                'level'              => 'Advanced',
                'start_date'         => Carbon::now()->addDays(3),
                'end_date'           => Carbon::now()->addDays(7),
                'start_time'         => '14:00:00',
                'end_time'           => '17:00:00',
                'resource_person'    => 'Jane Smith',
            ],
            [
                'course_title'       => 'Data Analysis with Python',
                'course_description' => 'Learn Pandas, NumPy, and visualization tools.',
                'platform_used'      => 'Zoom',
                'category'           => 'Data Science',
                'level'              => 'Intermediate',
                'start_date'         => Carbon::now()->addDays(1),
                'end_date'           => Carbon::now()->addDays(4),
                'start_time'         => '10:00:00',
                'end_time'           => '13:00:00',
                'resource_person'    => 'Alice Johnson',
            ],
            [
                'course_title'       => 'Cybersecurity Essentials',
                'course_description' => 'Protect networks, data, and applications from threats.',
                'platform_used'      => 'Microsoft Teams',
                'category'           => 'IT Security',
                'level'              => 'Beginner',
                'start_date'         => Carbon::now()->addDays(5),
                'end_date'           => Carbon::now()->addDays(6),
                'start_time'         => '09:00:00',
                'end_time'           => '12:00:00',
                'resource_person'    => 'Robert Lee',
            ],
            [
                'course_title'       => 'Machine Learning with Python',
                'course_description' => 'Hands-on ML projects using scikit-learn.',
                'platform_used'      => 'Zoom',
                'category'           => 'Data Science',
                'level'              => 'Advanced',
                'start_date'         => Carbon::now()->addDays(7),
                'end_date'           => Carbon::now()->addDays(10),
                'start_time'         => '13:00:00',
                'end_time'           => '16:00:00',
                'resource_person'    => 'Emily Davis',
            ],
            [
                'course_title'       => 'UI/UX Design Fundamentals',
                'course_description' => 'Design user-friendly interfaces and experiences.',
                'platform_used'      => 'Google Meet',
                'category'           => 'Design',
                'level'              => 'Beginner',
                'start_date'         => Carbon::now()->addDays(2),
                'end_date'           => Carbon::now()->addDays(3),
                'start_time'         => '10:00:00',
                'end_time'           => '12:00:00',
                'resource_person'    => 'Laura White',
            ],
            [
                'course_title'       => 'Cloud Computing with AWS',
                'course_description' => 'Learn cloud deployment and AWS services.',
                'platform_used'      => 'Zoom',
                'category'           => 'Cloud',
                'level'              => 'Intermediate',
                'start_date'         => Carbon::now()->addDays(4),
                'end_date'           => Carbon::now()->addDays(6),
                'start_time'         => '09:00:00',
                'end_time'           => '12:00:00',
                'resource_person'    => 'Michael Brown',
            ],
            [
                'course_title'       => 'Digital Marketing Strategies',
                'course_description' => 'Learn SEO, social media, and content marketing.',
                'platform_used'      => 'Microsoft Teams',
                'category'           => 'Marketing',
                'level'              => 'Beginner',
                'start_date'         => Carbon::now()->addDays(1),
                'end_date'           => Carbon::now()->addDays(2),
                'start_time'         => '11:00:00',
                'end_time'           => '14:00:00',
                'resource_person'    => 'Sarah Green',
            ],
            [
                'course_title'       => 'Mobile App Development with Flutter',
                'course_description' => 'Build cross-platform mobile apps.',
                'platform_used'      => 'Zoom',
                'category'           => 'Programming',
                'level'              => 'Intermediate',
                'start_date'         => Carbon::now()->addDays(3),
                'end_date'           => Carbon::now()->addDays(5),
                'start_time'         => '13:00:00',
                'end_time'           => '16:00:00',
                'resource_person'    => 'David Wilson',
            ],
            [
                'course_title'       => 'Effective Communication Skills',
                'course_description' => 'Improve verbal and written communication.',
                'platform_used'      => 'Google Meet',
                'category'           => 'Soft Skills',
                'level'              => 'Beginner',
                'start_date'         => Carbon::now()->addDays(2),
                'end_date'           => Carbon::now()->addDays(2),
                'start_time'         => '09:00:00',
                'end_time'           => '11:00:00',
                'resource_person'    => 'Anna Thompson',
            ],
        ];

        foreach ($trainings as $training) {
            Training::create($training);
        }
    }
}

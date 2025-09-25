<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        $trainings = [
            // Web Development (category_id = 3)
            [
                'external_id' => 101,
                'course_title' => 'Introduction to Web Development',
                'platform_used' => 'Zoom',
                'course_description' => 'Learn the basics of HTML, CSS, and JavaScript.',
                'category_id' => 3,
                'level' => 'Beginner',
                'start_date' => '2025-09-24',
                'end_date' => '2025-10-01',
                'resource_person' => 'John Doe',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'external_id' => 102,
                'course_title' => 'Advanced JavaScript',
                'platform_used' => 'Google Meet',
                'course_description' => 'Deep dive into modern JavaScript frameworks.',
                'category_id' => 3,
                'level' => 'Advanced',
                'start_date' => '2025-10-05',
                'end_date' => '2025-10-12',
                'resource_person' => 'Jane Smith',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
            ],

            // Mobile Development (category_id = 4)
            [
                'external_id' => 11,
                'course_title' => 'Mobile App Development with Flutter',
                'platform_used' => 'Google Meet',
                'course_description' => 'Build cross-platform mobile apps using Flutter.',
                'category_id' => 4,
                'level' => 'Intermediate',
                'start_date' => '2025-10-01',
                'end_date' => '2025-10-10',
                'resource_person' => 'Alice Johnson',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
            ],
            [
                'external_id' => 12,
                'course_title' => 'iOS App Development',
                'platform_used' => 'Zoom',
                'course_description' => 'Learn to build native iOS apps using Swift.',
                'category_id' => 4,
                'level' => 'Beginner',
                'start_date' => '2025-10-12',
                'end_date' => '2025-10-20',
                'resource_person' => 'Michael Lee',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
            ],

            // Data Science (category_id = 8)
            [
                'external_id' => 201,
                'course_title' => 'Data Analysis with Python',
                'platform_used' => 'Google Meet',
                'course_description' => 'Learn Python for data analysis and visualization.',
                'category_id' => 8,
                'level' => 'Beginner',
                'start_date' => '2025-09-25',
                'end_date' => '2025-10-02',
                'resource_person' => 'Laura White',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'external_id' => 202,
                'course_title' => 'Machine Learning Basics',
                'platform_used' => 'Zoom',
                'course_description' => 'Introduction to machine learning algorithms.',
                'category_id' => 8,
                'level' => 'Intermediate',
                'start_date' => '2025-10-03',
                'end_date' => '2025-10-10',
                'resource_person' => 'David Kim',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
            ],

            // Cybersecurity (category_id = 5)
            [
                'external_id' => 301,
                'course_title' => 'Introduction to Cybersecurity',
                'platform_used' => 'Zoom',
                'course_description' => 'Learn the basics of network security and ethical hacking.',
                'category_id' => 5,
                'level' => 'Beginner',
                'start_date' => '2025-09-28',
                'end_date' => '2025-10-05',
                'resource_person' => 'Kevin Brown',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'external_id' => 302,
                'course_title' => 'Advanced Ethical Hacking',
                'platform_used' => 'Google Meet',
                'course_description' => 'Learn penetration testing techniques and security auditing.',
                'category_id' => 5,
                'level' => 'Advanced',
                'start_date' => '2025-10-06',
                'end_date' => '2025-10-15',
                'resource_person' => 'Emily Davis',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
            ],

            // AI & Machine Learning (category_id = 1)
            [
                'external_id' => 401,
                'course_title' => 'AI for Beginners',
                'platform_used' => 'Zoom',
                'course_description' => 'Introduction to artificial intelligence concepts.',
                'category_id' => 1,
                'level' => 'Beginner',
                'start_date' => '2025-10-01',
                'end_date' => '2025-10-08',
                'resource_person' => 'Sophia Green',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'external_id' => 402,
                'course_title' => 'Machine Learning Advanced',
                'platform_used' => 'Google Meet',
                'course_description' => 'Advanced machine learning algorithms and applications.',
                'category_id' => 1,
                'level' => 'Advanced',
                'start_date' => '2025-10-09',
                'end_date' => '2025-10-18',
                'resource_person' => 'Brian Wilson',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
            ],

            // Cloud Computing (category_id = 6)
            [
                'external_id' => 601,
                'course_title' => 'Cloud Computing Fundamentals',
                'platform_used' => 'Zoom',
                'course_description' => 'Learn basics of cloud infrastructure and services.',
                'category_id' => 6,
                'level' => 'Beginner',
                'start_date' => '2025-10-01',
                'end_date' => '2025-10-07',
                'resource_person' => 'Olivia Clark',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
            ],
            [
                'external_id' => 602,
                'course_title' => 'AWS Advanced Deployment',
                'platform_used' => 'Google Meet',
                'course_description' => 'Learn advanced cloud deployment on AWS.',
                'category_id' => 6,
                'level' => 'Advanced',
                'start_date' => '2025-10-08',
                'end_date' => '2025-10-15',
                'resource_person' => 'Liam Johnson',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
            ],

            // UI/UX Design (category_id = 10)
            [
                'external_id' => 701,
                'course_title' => 'UI/UX Design Basics',
                'platform_used' => 'Zoom',
                'course_description' => 'Learn the fundamentals of user interface and experience design.',
                'category_id' => 10,
                'level' => 'Beginner',
                'start_date' => '2025-10-02',
                'end_date' => '2025-10-09',
                'resource_person' => 'Mia Thompson',
                'start_time' => '10:00:00',
                'end_time' => '13:00:00',
            ],
            [
                'external_id' => 702,
                'course_title' => 'Advanced UX Techniques',
                'platform_used' => 'Google Meet',
                'course_description' => 'Learn advanced UX research and design strategies.',
                'category_id' => 10,
                'level' => 'Advanced',
                'start_date' => '2025-10-10',
                'end_date' => '2025-10-17',
                'resource_person' => 'Noah Martin',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
            ],
        ];

        foreach ($trainings as $t) {
            Training::create($t);
        }
    }
}

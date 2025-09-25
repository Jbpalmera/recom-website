<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'category_name' => 'AI & Machine Learning', 'category_desc' => 'Artificial Intelligence and Machine Learning algorithms and applications'],
            ['id' => 2, 'category_name' => 'AI & Creative Arts', 'category_desc' => 'Combining AI technology with creative digital arts'],
            ['id' => 3, 'category_name' => 'Web Development', 'category_desc' => 'Full-stack web development including frontend and backend technologies'],
            ['id' => 4, 'category_name' => 'Mobile Development', 'category_desc' => 'Mobile app development for iOS and Android platforms'],
            ['id' => 5, 'category_name' => 'Cybersecurity', 'category_desc' => 'Network security, ethical hacking, and cyber protection'],
            ['id' => 6, 'category_name' => 'Cloud Computing', 'category_desc' => 'AWS, Azure, Google Cloud and cloud infrastructure management'],
            ['id' => 7, 'category_name' => 'Cloud Security', 'category_desc' => 'Security specific to cloud environments and services'],
            ['id' => 8, 'category_name' => 'Data Science', 'category_desc' => 'Data analysis, statistics, and scientific methods'],
            ['id' => 9, 'category_name' => 'Data Analytics', 'category_desc' => 'Data visualization, interpretation, and business intelligence'],
            ['id' => 10, 'category_name' => 'UI/UX Design', 'category_desc' => 'User interface and user experience design principles'],
            ['id' => 11, 'category_name' => 'Blockchain', 'category_desc' => 'Blockchain technology, cryptocurrencies, and decentralized applications'],
            ['id' => 12, 'category_name' => 'DevOps', 'category_desc' => 'Development operations, automation, and deployment pipelines'],
            ['id' => 13, 'category_name' => 'Database', 'category_desc' => 'Database design, management, and optimization'],
            ['id' => 14, 'category_name' => 'Computer Engineering', 'category_desc' => 'Computer hardware and software engineering principles'],
            ['id' => 15, 'category_name' => 'Electronics Engineering', 'category_desc' => 'Electronics and communications engineering'],
            ['id' => 16, 'category_name' => 'IoT Technology', 'category_desc' => 'Internet of Things devices and applications'],
            ['id' => 17, 'category_name' => 'IT Fundamentals', 'category_desc' => 'Basic IT skills and operating systems'],
            ['id' => 18, 'category_name' => 'Graphic Design', 'category_desc' => 'Digital graphics creation and design principles'],
            ['id' => 19, 'category_name' => 'Women in Tech', 'category_desc' => 'Empowerment and technology education for women'],
            ['id' => 20, 'category_name' => 'Finance', 'category_desc' => 'Financial management and technology'],
            ['id' => 21, 'category_name' => 'Education', 'category_desc' => 'Educational technology and teaching methods'],
            ['id' => 22, 'category_name' => 'Security', 'category_desc' => 'General security principles and practices'],
            ['id' => 23, 'category_name' => 'Computer Basics', 'category_desc' => 'Fundamental computer skills and literacy'],
        ];

        foreach ($categories as $c) {
            Category::updateOrCreate(['id' => $c['id']], $c);
        }
    }
}
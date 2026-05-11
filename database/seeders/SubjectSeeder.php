<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [

            // 🟢 ELEMENTARY (Core Subjects)
            [
                'code' => 'ENG',
                'name' => 'English',
                'level' => 'elementary',
            ],
            [
                'code' => 'FIL',
                'name' => 'Filipino',
                'level' => 'elementary',
            ],
            [
                'code' => 'MATH',
                'name' => 'Mathematics',
                'level' => 'elementary',
            ],
            [
                'code' => 'SCI',
                'name' => 'Science',
                'level' => 'elementary',
            ],
            [
                'code' => 'AP',
                'name' => 'Araling Panlipunan',
                'level' => 'elementary',
            ],
            [
                'code' => 'EPP',
                'name' => 'Edukasyong Pantahanan at Pangkabuhayan',
                'level' => 'elementary',
            ],
            [
                'code' => 'MAPEH',
                'name' => 'Music, Arts, PE, Health',
                'level' => 'elementary',
            ],

            // 🟡 JUNIOR HIGH SCHOOL
            [
                'code' => 'TLE',
                'name' => 'Technology and Livelihood Education',
                'level' => 'junior_high',
            ],
            [
                'code' => 'ESP',
                'name' => 'Edukasyon sa Pagpapakatao',
                'level' => 'junior_high',
            ],
            [
                'code' => 'RESEARCH',
                'name' => 'Research / Investigatory Project',
                'level' => 'junior_high',
            ],

            // 🔵 SENIOR HIGH SCHOOL CORE SUBJECTS
            [
                'code' => 'UCSP',
                'name' => 'Understanding Culture, Society and Politics',
                'level' => 'senior_high',
            ],
            [
                'code' => 'PHILO',
                'name' => 'Introduction to Philosophy',
                'level' => 'senior_high',
            ],
            [
                'code' => 'PR1',
                'name' => 'Practical Research 1',
                'level' => 'senior_high',
            ],
            [
                'code' => 'PR2',
                'name' => 'Practical Research 2',
                'level' => 'senior_high',
            ],
            [
                'code' => 'EAPP',
                'name' => 'English for Academic and Professional Purposes',
                'level' => 'senior_high',
            ],
            [
                'code' => 'DRRR',
                'name' => 'Disaster Readiness and Risk Reduction',
                'level' => 'senior_high',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                ['code' => $subject['code']],
                $subject
            );
        }
    }
}
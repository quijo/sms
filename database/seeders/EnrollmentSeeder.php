<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\GradeLevel;
use App\Models\Section;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $preschool = Program::where('code', 'PS')->first();
        $elementary = Program::where('code', 'EL')->first();

        $kinder = GradeLevel::where('name', 'Kinder')->first();
        $g1 = GradeLevel::where('name', 'Grade 1')->first();

        $sectionKinder = Section::where('code', 'K-A')->first();
        $sectionG1 = Section::where('code', 'G1-A')->first();

        DB::table('enrollments')->insert([

            // 🟢 Preschool Student
            [
                'first_name' => 'Juan',
                'middle_name' => 'Dela',
                'last_name' => 'Cruz',
                'birthdate' => '2020-05-10',
                'gender' => 'male',
                'address' => 'Cebu City',

                'program_id' => $preschool?->id,
                'grade_level_id' => $kinder?->id,
                'section_id' => $sectionKinder?->id,

                'school_year' => '2025-2026',
                'student_type' => 'new',
                'status' => 'approved',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 🟡 Elementary Student
            [
                'first_name' => 'Maria',
                'middle_name' => 'Santos',
                'last_name' => 'Reyes',
                'birthdate' => '2018-03-12',
                'gender' => 'female',
                'address' => 'Mandaue City',

                'program_id' => $elementary?->id,
                'grade_level_id' => $g1?->id,
                'section_id' => $sectionG1?->id,

                'school_year' => '2025-2026',
                'student_type' => 'old',
                'status' => 'pending',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
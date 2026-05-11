<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use App\Models\GradeLevel;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $preschool = Program::where('code', 'PS')->first();
        $elementary = Program::where('code', 'EL')->first();
        $jhs = Program::where('code', 'JHS')->first();
        $shs = Program::where('code', 'SHS')->first();
        $college = Program::where('code', 'COL')->first();

        // Grade Levels (Kinder to Grade 6)
        $kinder = GradeLevel::where('name', 'Kinder')->first();
        $g1 = GradeLevel::where('name', 'Grade 1')->first();
        $g2 = GradeLevel::where('name', 'Grade 2')->first();
        $g3 = GradeLevel::where('name', 'Grade 3')->first();
        $g4 = GradeLevel::where('name', 'Grade 4')->first();
        $g5 = GradeLevel::where('name', 'Grade 5')->first();
        $g6 = GradeLevel::where('name', 'Grade 6')->first();

        // Fallback levels for higher programs (still NOT NULL safe)
        $jhsLevel = GradeLevel::firstOrCreate(
            ['name' => 'Junior High School'],
            ['code' => 'JHS', 'order' => 7, 'is_active' => true]
        );

        $shsLevel = GradeLevel::firstOrCreate(
            ['name' => 'Senior High School'],
            ['code' => 'SHS', 'order' => 8, 'is_active' => true]
        );

        $collegeLevel = GradeLevel::firstOrCreate(
            ['name' => 'College'],
            ['code' => 'COL', 'order' => 9, 'is_active' => true]
        );

        DB::table('sections')->insert([

            // 🟢 PRESCHOOL
            [
                'name' => 'Kinder - A',
                'code' => 'K-A',
                'program_id' => $preschool?->id,
                'grade_level_id' => $kinder?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 🟡 ELEMENTARY
            [
                'name' => 'Grade 1 - A',
                'code' => 'G1-A',
                'program_id' => $elementary?->id,
                'grade_level_id' => $g1?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 2 - A',
                'code' => 'G2-A',
                'program_id' => $elementary?->id,
                'grade_level_id' => $g2?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 3 - A',
                'code' => 'G3-A',
                'program_id' => $elementary?->id,
                'grade_level_id' => $g3?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 4 - A',
                'code' => 'G4-A',
                'program_id' => $elementary?->id,
                'grade_level_id' => $g4?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 5 - A',
                'code' => 'G5-A',
                'program_id' => $elementary?->id,
                'grade_level_id' => $g5?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grade 6 - A',
                'code' => 'G6-A',
                'program_id' => $elementary?->id,
                'grade_level_id' => $g6?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 🔵 JUNIOR HIGH SCHOOL
            [
                'name' => 'Grade 7 - Einstein',
                'code' => 'G7-E',
                'program_id' => $jhs?->id,
                'grade_level_id' => $jhsLevel?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 🔴 SENIOR HIGH SCHOOL
            [
                'name' => 'STEM 11 - A',
                'code' => 'SHS-STEM11-A',
                'program_id' => $shs?->id,
                'grade_level_id' => $shsLevel?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 🟣 COLLEGE
            [
                'name' => 'BSIT 1A',
                'code' => 'BSIT-1A',
                'program_id' => $college?->id,
                'grade_level_id' => $collegeLevel?->id,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
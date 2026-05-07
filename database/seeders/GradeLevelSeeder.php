<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GradeLevel;
class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['name' => 'Preschool', 'code' => 'PS', 'order' => 1],
            ['name' => 'Kindergarten', 'code' => 'K', 'order' => 2],

            ['name' => 'Grade 1', 'code' => 'G1', 'order' => 3],
            ['name' => 'Grade 2', 'code' => 'G2', 'order' => 4],
            ['name' => 'Grade 3', 'code' => 'G3', 'order' => 5],
            ['name' => 'Grade 4', 'code' => 'G4', 'order' => 6],
            ['name' => 'Grade 5', 'code' => 'G5', 'order' => 7],
            ['name' => 'Grade 6', 'code' => 'G6', 'order' => 8],

            ['name' => 'Grade 7', 'code' => 'G7', 'order' => 9],
            ['name' => 'Grade 8', 'code' => 'G8', 'order' => 10],
            ['name' => 'Grade 9', 'code' => 'G9', 'order' => 11],
            ['name' => 'Grade 10', 'code' => 'G10', 'order' => 12],

            ['name' => 'Grade 11', 'code' => 'G11', 'order' => 13],
            ['name' => 'Grade 12', 'code' => 'G12', 'order' => 14],

            ['name' => 'College 1st Year', 'code' => 'C1', 'order' => 15],
            ['name' => 'College 2nd Year', 'code' => 'C2', 'order' => 16],
            ['name' => 'College 3rd Year', 'code' => 'C3', 'order' => 17],
            ['name' => 'College 4th Year', 'code' => 'C4', 'order' => 18],
        ];

        foreach ($levels as $level) {
            GradeLevel::updateOrCreate(
                ['name' => $level['name']],
                [
                    'code' => $level['code'],
                    'order' => $level['order'],
                    'is_active' => true,
                ]
            );
        }
    }
    }


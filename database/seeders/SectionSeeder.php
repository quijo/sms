<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\GradeLevel;
use App\Models\Program;

class SectionSeeder extends Seeder
{
   public function run(): void
{
    $program = Program::first();

    if (!$program) {
        return;
    }

    $data = [
        'Preschool' => ['Sunshine', 'Rainbow'],
        'Kindergarten' => ['Dove', 'Star'],

        'Grade 1' => ['Hope', 'Faith'],
        'Grade 2' => ['Love', 'Joy'],
        'Grade 3' => ['Peace', 'Grace'],
        'Grade 4' => ['Truth', 'Wisdom'],
        'Grade 5' => ['Courage', 'Honor'],
        'Grade 6' => ['Unity', 'Fortitude'],

        'Grade 7' => ['Alpha', 'Beta'],
        'Grade 8' => ['Gamma', 'Delta'],
        'Grade 9' => ['Eagle', 'Lion'],
        'Grade 10' => ['Diamond', 'Ruby'],

        'Grade 11' => ['STEM-A', 'STEM-B'],
        'Grade 12' => ['ABM-A', 'HUMSS-A'],

        'College 1st Year' => ['Block A', 'Block B'],
        'College 2nd Year' => ['Block A', 'Block B'],
        'College 3rd Year' => ['Block A', 'Block B'],
        'College 4th Year' => ['Block A', 'Block B'],
    ];

    foreach ($data as $gradeName => $sections) {

        $gradeLevel = GradeLevel::where('name', $gradeName)->first();

        if (!$gradeLevel) {
            continue;
        }

        foreach ($sections as $sectionName) {
            Section::updateOrCreate(
                [
                    'name' => $sectionName,
                    'grade_level_id' => $gradeLevel->id,
                    'program_id' => $program->id,
                ],
                [
                    'is_active' => true,
                ]
            );
        }
    }
}
}


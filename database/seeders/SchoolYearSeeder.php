<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('school_years')->insert([
            [
                'year' => '2024-2025',
                'start_date' => '2024-06-01',
                'end_date' => '2025-03-31',
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => '2025-2026',
                'start_date' => '2025-06-01',
                'end_date' => '2026-03-31',
                'is_active' => true, // current active year
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
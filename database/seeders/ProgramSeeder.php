<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'name' => 'Preschool',
                'code' => 'PS',
                'description' => 'Early childhood education program',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elementary',
                'code' => 'EL',
                'description' => 'Basic elementary education program',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Junior High School',
                'code' => 'JHS',
                'description' => 'Secondary education - junior level',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Senior High School',
                'code' => 'SHS',
                'description' => 'Secondary education - senior level',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'College',
                'code' => 'COL',
                'description' => 'Tertiary education program',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
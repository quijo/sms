<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SmsUserSeeder extends Seeder
{
    public function run(): void
    {
        // SUPER ADMIN
        User::updateOrCreate(
            ['email' => 'admin@sms.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        )->assignRole('super-admin');

        // PRINCIPAL
        User::updateOrCreate(
            ['email' => 'principal@sms.com'],
            [
                'name' => 'School Principal',
                'password' => Hash::make('password'),
            ]
        )->assignRole('principal');

        // TEACHER
        User::updateOrCreate(
            ['email' => 'teacher@sms.com'],
            [
                'name' => 'Sample Teacher',
                'password' => Hash::make('password'),
            ]
        )->assignRole('teacher');

        // STUDENT
        User::updateOrCreate(
            ['email' => 'student@sms.com'],
            [
                'name' => 'Sample Student',
                'password' => Hash::make('password'),
            ]
        )->assignRole('student');

        // // PASTOR (if you're using church-based access too)
        // User::updateOrCreate(
        //     ['email' => 'pastor@sms.com'],
        //     [
        //         'name' => 'Pastor User',
        //         'password' => Hash::make('password'),
        //     ]
        // )->assignRole('pastor');
    }
}
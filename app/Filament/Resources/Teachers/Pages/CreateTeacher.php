<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Filament\Resources\Teachers\TeacherResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
          // Create or reuse user
    $user = \App\Models\User::firstOrCreate(
        ['email' => $data['email']],
        [
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'password' => bcrypt('password123'),
        ]
    );

    // Generate employee ID
    $data['employee_id'] = 'EMP-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

    // Attach user
    $data['user_id'] = $user->id;

    return $data;
    }
}
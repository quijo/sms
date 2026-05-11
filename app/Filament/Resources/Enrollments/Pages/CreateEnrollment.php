<?php

namespace App\Filament\Resources\Enrollments\Pages;

use App\Models\Student;
use App\Models\Subject;
use App\Filament\Resources\Enrollments\EnrollmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEnrollment extends CreateRecord
{
    protected static string $resource = EnrollmentResource::class;

   protected function afterCreate(): void
{
    $data = $this->form->getState();
    $enrollment = $this->record;

    // attach selected subjects
    $enrollment->subjects()->sync($data['subjects'] ?? []);

    // custom subject
    if (!empty($data['custom_subject'])) {

        $subject = \App\Models\Subject::create([
            'code' => null,
            'name' => $data['custom_subject'],
            'level' => $data['level'] ?? 'custom',
        ]);

        $enrollment->subjects()->attach($subject->id, [
            'is_custom' => true,
        ]);
    }
}
}

<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use App\Models\Program;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Subject;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /*
            |--------------------------------------------------------------------------
            | STUDENT INFORMATION
            |--------------------------------------------------------------------------
            */

            TextInput::make('first_name')
                ->required(),

            TextInput::make('middle_name'),

            TextInput::make('last_name')
                ->required(),

            DatePicker::make('birthdate')
                ->required(),

            Select::make('gender')
                ->options([
                    'male' => 'Male',
                    'female' => 'Female',
                ])
                ->required(),

            Textarea::make('address')
                ->columnSpanFull(),

            /*
            |--------------------------------------------------------------------------
            | PROGRAM
            |--------------------------------------------------------------------------
            */

            Select::make('program_id')
                ->label('Program')
                ->options(
                    Program::orderBy('name')->pluck('name', 'id')
                )
                ->searchable()
                ->preload()
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | GRADE LEVEL
            |--------------------------------------------------------------------------
            */

            Select::make('grade_level_id')
                ->label('Grade Level')
                ->options(
                    GradeLevel::orderBy('order')->pluck('name', 'id')
                )
                ->searchable()
                ->preload()
                ->live()
                ->afterStateUpdated(function (Set $set, $state) {

    $set('section_id', null);

    $gradeLevel = GradeLevel::find($state);

    if (! $gradeLevel) {
        return;
    }

    $subjectIds = Subject::where('level', $gradeLevel->level)
        ->pluck('id')
        ->toArray();

    $set('subjects', $subjectIds);

                })
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | SECTION
            |--------------------------------------------------------------------------
            */

            Select::make('section_id')
                ->label('Section')
                ->options(function (Get $get) {

                    $gradeLevelId = $get('grade_level_id');

                    if (! $gradeLevelId) {
                        return [];
                    }

                    return Section::where('grade_level_id', $gradeLevelId)
                        ->orderBy('name')
                        ->pluck('name', 'id');
                })
                ->searchable()
                ->preload()
                ->live()
                ->disabled(fn (Get $get) => ! $get('grade_level_id'))
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | SCHOOL YEAR
            |--------------------------------------------------------------------------
            */

            Select::make('school_year')
                ->options([
                    '2025-2026' => '2025-2026',
                    '2026-2027' => '2026-2027',
                    '2027-2028' => '2027-2028',
                ])
                ->default('2026-2027')
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | STUDENT TYPE
            |--------------------------------------------------------------------------
            */

            Select::make('student_type')
                ->options([
                    'new' => 'New',
                    'old' => 'Old',
                    'transferee' => 'Transferee',
                    'returnee' => 'Returnee',
                ])
                ->default('new')
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->default('pending')
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | LEVEL
            |--------------------------------------------------------------------------
            */

            Select::make('level')
                ->options([
                    'elementary' => 'Elementary',
                    'junior_high' => 'Junior High',
                    'senior_high' => 'Senior High',
                ])
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | SUBJECTS
            |--------------------------------------------------------------------------
            */

            Select::make('subjects')
                ->label('Subjects')
                ->multiple()
                ->searchable()
                ->preload()
                ->options(function (Get $get) {

                    $gradeLevelId = $get('grade_level_id');

                    if (! $gradeLevelId) {
                        return [];
                    }

                   $gradeLevel = GradeLevel::find($gradeLevelId);

if (! $gradeLevel) {
    return [];
}

return Subject::where('level', $gradeLevel->level)
    ->orderBy('name')
    ->pluck('name', 'id');
                })
                ->helperText('Subjects are automatically loaded based on grade level.')
                ->required(),

            /*
            |--------------------------------------------------------------------------
            | CUSTOM SUBJECT
            |--------------------------------------------------------------------------
            */

            TextInput::make('custom_subject')
                ->label('Add Custom Subject')
                ->nullable(),

        ]);
    }
}
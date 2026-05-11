<?php

namespace App\Filament\Resources\Enrollments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Models\Enrollment;
use App\Models\Student;




class EnrollmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('middle_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('birthdate')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                    ->badge(),
                TextColumn::make('program.name')
                    ->numeric()
                    ->sortable(),
               TextColumn::make('gradeLevel.name')
    ->label('Grade Level')
    ->sortable()
    ->searchable(),
                TextColumn::make('section.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('school_year')
                    ->searchable(),
                TextColumn::make('student_type')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
          Action::make('approve')
    ->action(function (Enrollment $record) {

        $record->update([
            'status' => 'approved',
        ]);

        Student::updateOrCreate(
            [
                'user_id' => $record->user_id,
            ],
            [
                'enrollment_id' => $record->id,
                'program_id' => $record->program_id,
                'grade_level_id' => $record->grade_level_id,
                'section_id' => $record->section_id,
            ]
        );
    }),

    EditAction::make(),
                
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

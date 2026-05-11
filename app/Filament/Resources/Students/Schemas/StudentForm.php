<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextInput::make('student_number')->disabled(),

Select::make('section_id')
    ->relationship('section', 'name'),

Select::make('grade_level_id')
    ->relationship('gradeLevel', 'name'),
            ]);
    }
}

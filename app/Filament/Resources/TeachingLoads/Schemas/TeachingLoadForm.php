<?php

namespace App\Filament\Resources\TeachingLoads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
class TeachingLoadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('teacher_id')
    ->label('Teacher')
    ->relationship('teacher', 'first_name')
    ->searchable()
    ->preload()
    ->required(),

Select::make('subject_id')
    ->label('Subject')
    ->relationship('subject', 'name')
    ->searchable()
    ->preload()
    ->required(),

Select::make('section_id')
    ->label('Section')
    ->relationship('section', 'name')
    ->searchable()
    ->preload()
    ->required(),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->default(null),
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('grade_level_id')
                    ->relationship('gradeLevel', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
               Select::make('adviser_id')
    ->label('Class Adviser')
    ->relationship('adviser', 'first_name')
    ->getOptionLabelFromRecordUsing(fn ($record) =>
        $record->first_name . ' ' . $record->last_name
    )
    ->searchable()
    ->preload()
    ->nullable(),
            ]);
    }
}

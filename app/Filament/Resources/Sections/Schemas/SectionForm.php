<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('grade_level')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}

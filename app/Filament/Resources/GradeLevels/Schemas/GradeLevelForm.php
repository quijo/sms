<?php

namespace App\Filament\Resources\GradeLevels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GradeLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('name')
            ->required()
            ->maxLength(100),

        TextInput::make('code')
            ->maxLength(20),

        TextInput::make('order')
            ->numeric()
            ->default(1),

        Toggle::make('is_active')
            ->default(true),
    ]);
    }
}

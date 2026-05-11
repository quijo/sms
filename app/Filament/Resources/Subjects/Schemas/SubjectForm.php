<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
                Select::make('level')
                    ->options(['elementary' => 'Elementary', 'junior_high' => 'Junior high', 'senior_high' => 'Senior high'])
                    ->required(),
            ]);
    }
}

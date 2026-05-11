<?php

namespace App\Filament\Resources\GradeLevels\RelationManagers;

use App\Filament\Resources\GradeLevels\GradeLevelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class SubjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'subjects';

    protected static ?string $relatedResource = GradeLevelResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}

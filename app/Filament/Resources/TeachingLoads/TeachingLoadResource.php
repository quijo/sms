<?php

namespace App\Filament\Resources\TeachingLoads;

use App\Filament\Resources\TeachingLoads\Pages\CreateTeachingLoad;
use App\Filament\Resources\TeachingLoads\Pages\EditTeachingLoad;
use App\Filament\Resources\TeachingLoads\Pages\ListTeachingLoads;
use App\Filament\Resources\TeachingLoads\Schemas\TeachingLoadForm;
use App\Filament\Resources\TeachingLoads\Tables\TeachingLoadsTable;
use App\Models\TeachingLoad;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TeachingLoadResource extends Resource
{
    protected static ?string $model = TeachingLoad::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TeachingLoadForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeachingLoadsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTeachingLoads::route('/'),
            'create' => CreateTeachingLoad::route('/create'),
            'edit' => EditTeachingLoad::route('/{record}/edit'),
        ];
    }
}

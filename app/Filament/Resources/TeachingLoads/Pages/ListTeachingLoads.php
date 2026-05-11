<?php

namespace App\Filament\Resources\TeachingLoads\Pages;

use App\Filament\Resources\TeachingLoads\TeachingLoadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTeachingLoads extends ListRecords
{
    protected static string $resource = TeachingLoadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

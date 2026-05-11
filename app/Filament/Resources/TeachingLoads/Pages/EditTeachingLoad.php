<?php

namespace App\Filament\Resources\TeachingLoads\Pages;

use App\Filament\Resources\TeachingLoads\TeachingLoadResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTeachingLoad extends EditRecord
{
    protected static string $resource = TeachingLoadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

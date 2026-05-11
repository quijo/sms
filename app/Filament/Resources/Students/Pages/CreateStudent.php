<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{

protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['user_id'] = auth()->id(); // safe in Filament panel

    return $data;
}


    protected static string $resource = StudentResource::class;
}

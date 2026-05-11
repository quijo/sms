<?php




namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function afterSave(): void
    {
        $role = $this->data['role'] ?? null;

        if ($role) {
            $this->record->syncRoles([$role]);
        }
    }
}

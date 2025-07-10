<?php

namespace App\Filament\Admin\Resources\TaskAnswerResource\Pages;

use App\Filament\Admin\Resources\TaskAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskAnswer extends EditRecord
{
    protected static string $resource = TaskAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

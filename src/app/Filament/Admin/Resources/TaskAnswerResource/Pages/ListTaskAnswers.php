<?php

namespace App\Filament\Admin\Resources\TaskAnswerResource\Pages;

use App\Filament\Admin\Resources\TaskAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskAnswers extends ListRecords
{
    protected static string $resource = TaskAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

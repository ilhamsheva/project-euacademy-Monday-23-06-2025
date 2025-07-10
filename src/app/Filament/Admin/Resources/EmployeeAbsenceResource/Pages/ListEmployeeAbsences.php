<?php

namespace App\Filament\Admin\Resources\EmployeeAbsenceResource\Pages;

use App\Filament\Admin\Resources\EmployeeAbsenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeAbsences extends ListRecords
{
    protected static string $resource = EmployeeAbsenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

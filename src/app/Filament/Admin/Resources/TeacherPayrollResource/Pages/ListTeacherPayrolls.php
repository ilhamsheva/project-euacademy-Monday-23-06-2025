<?php

namespace App\Filament\Admin\Resources\TeacherPayrollResource\Pages;

use App\Filament\Admin\Resources\TeacherPayrollResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherPayrolls extends ListRecords
{
    protected static string $resource = TeacherPayrollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

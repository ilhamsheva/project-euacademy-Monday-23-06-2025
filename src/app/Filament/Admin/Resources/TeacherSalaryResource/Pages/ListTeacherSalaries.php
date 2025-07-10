<?php

namespace App\Filament\Admin\Resources\TeacherSalaryResource\Pages;

use App\Filament\Admin\Resources\TeacherSalaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherSalaries extends ListRecords
{
    protected static string $resource = TeacherSalaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

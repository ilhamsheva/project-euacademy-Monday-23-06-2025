<?php

namespace App\Filament\Admin\Resources\TeacherSalaryResource\Pages;

use App\Filament\Admin\Resources\TeacherSalaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeacherSalary extends EditRecord
{
    protected static string $resource = TeacherSalaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

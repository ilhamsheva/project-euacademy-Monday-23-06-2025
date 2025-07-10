<?php

namespace App\Filament\Admin\Resources\TeacherAbsenceResource\Pages;

use App\Filament\Admin\Resources\TeacherAbsenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherAbsences extends ListRecords
{
    protected static string $resource = TeacherAbsenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

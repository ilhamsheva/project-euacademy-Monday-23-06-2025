<?php

namespace App\Filament\Admin\Resources\CourseClassResource\Pages;

use App\Filament\Admin\Resources\CourseClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseClasses extends ListRecords
{
    protected static string $resource = CourseClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

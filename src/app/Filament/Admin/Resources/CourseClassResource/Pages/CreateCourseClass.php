<?php

namespace App\Filament\Admin\Resources\CourseClassResource\Pages;

use App\Filament\Admin\Resources\CourseClassResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseClass extends CreateRecord
{
    protected static string $resource = CourseClassResource::class;
}

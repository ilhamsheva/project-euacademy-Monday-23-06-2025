<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TaskResource\Pages;
use App\Filament\Admin\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Tugas Bahasa')
                ->tabs([
                    Tabs\Tab::make('Bahasa Inggris')
                        ->schema([
                            Repeater::make('english_tasks')
                                ->label('Tugas Bahasa Inggris')
                                ->schema([
                                    Select::make('course_id')
                                        ->label('Kursus')
                                        ->relationship('course', 'name')
                                        ->required(),
                                    TextInput::make('title')->label('Judul')->required(),
                                    Textarea::make('description')->label('Deskripsi'),
                                ])
                                ->minItems(1)
                                ->maxItems(10)
                                ->columnSpanFull(),
                        ]),
                    Tabs\Tab::make('Bahasa Jepang')
                        ->schema([
                            Repeater::make('japanese_tasks')
                                ->label('Tugas Bahasa Jepang')
                                ->schema([
                                    Select::make('course_id')
                                        ->label('Kursus')
                                        ->relationship('course', 'name')
                                        ->required(),
                                    TextInput::make('title')->label('Judul')->required(),
                                    Textarea::make('description')->label('Deskripsi'),
                                ])
                                ->minItems(1)
                                ->maxItems(10)
                                ->columnSpanFull(),
                        ]),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}

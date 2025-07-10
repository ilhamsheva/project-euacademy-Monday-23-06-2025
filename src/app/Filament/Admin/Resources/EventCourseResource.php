<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EventCourseResource\Pages;
use App\Filament\Admin\Resources\EventCourseResource\RelationManagers;
use App\Models\EventCourse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventCourseResource extends Resource
{
    protected static ?string $model = EventCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')
                    ->label('Nomor Batch')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Batch')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('duration')
                    ->label('Durasi (bulan)')
                    ->default(6)
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('start')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DatePicker::make('end')
                    ->label('Tanggal Selesai')
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\Select::make('employee_id')
                    ->label('Penanggung Jawab')
                    ->relationship('employee', 'fullname')
                    ->required(),
                Forms\Components\FileUpload::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->directory('courses-photo')
                    ->required()
                    ->maxSize(30720)
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->label('Nomor Batch'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Durasi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money( 'IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.fullname')
                    ->label('Penanggung Jawab')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('photo')
                    ->disk('public')
                    ->label('Foto'),
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
            'index' => Pages\ListEventCourses::route('/'),
            'create' => Pages\CreateEventCourse::route('/create'),
            'edit' => Pages\EditEventCourse::route('/{record}/edit'),
        ];
    }
}

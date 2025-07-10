<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TeacherAbsenceResource\Pages;
use App\Filament\Admin\Resources\TeacherAbsenceResource\RelationManagers;
use App\Models\TeacherAbsence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherAbsenceResource extends Resource
{
    protected static ?string $model = TeacherAbsence::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('teacher_id')
                    ->label('Pengajar')
                    ->relationship('teacher', 'fullname')
                    ->required(),
                Forms\Components\TextInput::make('course_class_id')
                    ->label('Kelas')
                    ->relationship('courseClass', 'class_number')
                    ->default(null),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->label('Status')
                    ->options([
                        'present' => 'Hadir',
                        'absent' => 'Tidak Hadir',
                        'reschedule' => 'Jadwal Ulang',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('remarks')
                    ->label('Keterangan')
                    ->rows(2)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.fullname')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('courseClass.class_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('remarks')
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
            'index' => Pages\ListTeacherAbsences::route('/'),
            'create' => Pages\CreateTeacherAbsence::route('/create'),
            'edit' => Pages\EditTeacherAbsence::route('/{record}/edit'),
        ];
    }
}

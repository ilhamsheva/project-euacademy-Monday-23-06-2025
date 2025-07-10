<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EmployeeAbsenceResource\Pages;
use App\Filament\Admin\Resources\EmployeeAbsenceResource\RelationManagers;
use App\Models\EmployeeAbsence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeAbsenceResource extends Resource
{
    protected static ?string $model = EmployeeAbsence::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('employee_id')
                    ->label('Employee')
                    ->relationship('employee', 'fullname')
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->label('Tanggal')
                    ->rules([
                        function($attribute, $value, $fail) {
                            $day = \Carbon\Carbon::parse($value)->dayOfWeek;
                            if ($day === 0 || $day === 6) {
                                $fail('Absen hanya dapat diisi pada hari kerja (Senin-Jumat).');
                            }
                        }
                    ])
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->label('Status')
                    ->options([
                        'present' => 'Hadir',
                        'absent' => 'Tanpa Keterangan',
                        'sick' => 'Sakit',
                        'leave' => 'Cuti',
                    ])
                    ->required(),
                Forms\Components\TextArea::make('remarks')
                    ->label('Keterangan')
                    ->rows(2)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullname')
                    ->label('Pegawai')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'present' => 'success',
                        'absent' => 'danger',
                        'sick' => 'warning',
                        'leave' => 'primary',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('remarks')
                    ->label('Keterangan')
                    ->wrap()
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
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'present' => 'Hadir',
                        'absent' => 'Tanpa Keterangan',
                        'sick' => 'Sakit',
                        'leave' => 'Cuti',
                    ])
                    ->default(null),
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
            'index' => Pages\ListEmployeeAbsences::route('/'),
            'create' => Pages\CreateEmployeeAbsence::route('/create'),
            'edit' => Pages\EditEmployeeAbsence::route('/{record}/edit'),
        ];
    }
}

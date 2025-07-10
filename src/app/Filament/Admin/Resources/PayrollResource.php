<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PayrollResource\Pages;
use App\Filament\Admin\Resources\PayrollResource\RelationManagers;
use App\Models\Payroll;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PayrollResource extends Resource
{
    protected static ?string $model = Payroll::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->label('Pegawai')
                    ->relationship('employee', 'fullname')
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('period_start')
                    ->label('Awal Periode')
                    ->required(),
                Forms\Components\DatePicker::make('period_end')
                    ->label('Akhir Periode')
                    ->required(),
                Forms\Components\TextInput::make('total_salary')
                    ->label('Total Gaji')
                    ->prefix('Rp. ')
                    ->default(50000000)
                    ->inputMode('decimal')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('transfer_date')
                    ->label('Tanggal Transfer')
                    ->required(),
                Forms\Components\Textarea::make('remarks')
                    ->label('Keterangan')
                    ->default(null),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Menunggu',
                        'paid' => 'Dibayar',
                        'cancelled' => 'Dibatalkan',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.fullname')
                    ->label('Pegawai')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('period_start')
                    ->label('Mulai')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('period_end')
                    ->label('Selesai')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_salary')
                    ->label('Total Gaji')
                    ->money('IDR', true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('transfer_date')
                    ->label('Tanggal Transfer')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('remarks')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->colors([
                        'pending' => 'bg-yellow-500 text-white',
                        'paid' => 'bg-green-500 text-white',
                        'cancelled' => 'bg-red-500 text-white',
                    ]),
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
            'index' => Pages\ListPayrolls::route('/'),
            'create' => Pages\CreatePayroll::route('/create'),
            'edit' => Pages\EditPayroll::route('/{record}/edit'),
        ];
    }
}

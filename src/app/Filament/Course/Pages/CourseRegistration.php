<?php

namespace App\Filament\Course\Pages;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\View\View;
use Filament\Pages\Page;
use Filament\Forms\Form;

class CourseRegistration extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $title = 'Course Registration';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.course.pages.course-registration';

    public $selected_course;
    public $selected_batch;
    public $payment_amount;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('selected_course')
                ->label('Pilih Kursus')
                ->options(\App\Models\Course::pluck('name', 'id'))
                ->required(),

            Select::make('selected_batch')
                ->label('Pilih Batch')
                ->options(fn (callable $get) => \App\Models\Batch::where('course_id', $get('selected_course'))->pluck('name', 'id'))
                ->required(),

            TextInput::make('payment_amount')
                ->label('Jumlah Pembayaran')
                ->numeric()
                ->required(),

            Actions::make([
                Actions\Action::make('submit')
                    ->label('Daftar')
                    ->action('submit'),
            ]),
        ]);
    }

    public function submit()
    {
        $this->notify('success', 'Registrasi berhasil!');
        return redirect()->to('/');
    }
}

<?php

use App\Filament\Pages\CourseRegistration;
use App\Http\Controllers\LearningController;
use App\Livewire\{Course, Home};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


// =======================
// Livewire asset routes
// =======================
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

// =======================
// Autentikasi USER bawaan Laravel (guard: web)
// =======================
Auth::routes();

// =======================
// Halaman Publik (guest, user, admin)
// =======================
Route::get('/', Home::class)->name('home');
Route::get('/course', Course::class)->name('course');

// =======================
// Hanya USER login (guard: web)
// =======================
Route::middleware(['auth', 'only.user'])->group(function () {
    Route::get('/mylearning', [LearningController::class, 'index'])->name('myLearning');
});

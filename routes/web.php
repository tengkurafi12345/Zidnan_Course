<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Routing Untuk Halaman Depan
 */
// Home
Route::get('/', function () {
    return view('Frontend.index');
});
// Paket Bimbel
Route::get('/course', function () {
    return view('Frontend.course');
});
// Siswa




/**
 * Routing Untuk Halaman Dashboard
 */
// Dashboard
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.password');
    // Course
    Route::get('/courses', function () {
        return view('Backend.course');
    })->name('course');
});

require __DIR__.'/auth.php';

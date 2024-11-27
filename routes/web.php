<?php

use App\Http\Controllers\CourseController;
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
Route::get('/course-fe', function () {
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
    // Course NB: Route Update Masih belum berhasil
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course', [CourseController::class,'store'])->name('course.store');
    Route::get('/course/{course}', [CourseController::class,'edit'])->name('course.edit');
    Route::put('/course/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/course/{course}/delete', [CourseController::class, 'destroy'])->name('course.destroy');
});

require __DIR__.'/auth.php';

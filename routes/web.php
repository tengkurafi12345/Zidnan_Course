<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Main\GuruController;
use App\Http\Controllers\Main\SiswaController;
use App\Http\Controllers\Main\KursusController;
use App\Http\Controllers\Main\TestimonialController;

/**
 * Routing Untuk Halaman Depan
 */
// Home
Route::get('/', function () {
    return view('Frontend.index');
});
// Paket Bimbel
Route::get('/kursus', [KursusController::class, 'index'])->name('kursus');
Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimoni');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
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
    // Teacher
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::patch('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{teacher}/delete', [TeacherController::class, 'destroy'])->name('teacher.destroy');

});

require __DIR__.'/auth.php';

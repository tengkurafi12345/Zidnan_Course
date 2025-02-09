<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Main\GuruController;
use App\Http\Controllers\Main\SiswaController;
use App\Http\Controllers\Main\KursusController;
use App\Http\Controllers\Main\TestimonialController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\StudentController;

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

    // Packet
    Route::get('/packet', [PacketController::class, 'index'])->name('packet.index');
    Route::get('/packet/create', [PacketController::class, 'create'])->name('packet.create');
    Route::post('/packet', [PacketController::class, 'store'])->name('packet.store');
    Route::get('/packet/{packet}', [PacketController::class, 'edit'])->name('packet.edit');
    Route::patch('/packet/{packet}', [PacketController::class, 'update'])->name('packet.update');
    Route::delete('/packet/{packet}/delete', [PacketController::class, 'destroy'])->name('packet.destroy');

    // Teacher
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::patch('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{teacher}/delete', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    // Student
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::patch('/student/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{student}/delete', [StudentController::class, 'destroy'])->name('student.destroy');


});

require __DIR__.'/auth.php';

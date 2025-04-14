<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Main\LowonganController;
use App\Http\Controllers\Main\PromoController;
use App\Http\Controllers\promotionController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Main\GuruController;
use App\Http\Controllers\Main\SiswaController;
use App\Http\Controllers\Main\KursusController;
use App\Http\Controllers\MeetingSetupController;
use App\Http\Controllers\Main\TestimonialController;
use App\Http\Controllers\TeacherPlacementController;
use App\Http\Controllers\MeetingAttendanceController;
use App\Http\Controllers\PacketCombinationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherAttendanceController;

/**
 * Routing Untuk Halaman Depan
 */
// Home
// Route::get('/', function () {
//     return view('Frontend.index');
// });
// Paket Bimbel
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/mengaji', [HomeController::class, 'mengaji'])->name('mengaji');

Route::get('/kursus', [KursusController::class, 'index'])->name('kursus');
Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimoni');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');

Route::get('/pendaftaran-guru', [GuruController::class, 'form'])->name('pendaftaran.guru.form');
Route::post('/pendaftaran-guru', [GuruController::class, 'store'])->name('pendaftaran.guru.store');

// Rute untuk lowongan
Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan');
Route::get('/lowongan-detail/{jobVacancy}', [LowonganController::class, 'show'])->name('lowongan.detail');
Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');

// Promo
Route::get('/promo', [PromoController::class, 'index'])->name('promo');

// Test send wa
Route::get('/send-wa', function () {

    $response = Http::withHeaders([
        'Authorization' => 'BGvVTFueiRAj5cZbUSJm',
    ])->post('https://api.fonnte.com/send', [
        'target' => '082127236220',
        'message' => 'test message',
    ]);

    dd(json_decode($response, true));
});

/**
 * Routing Untuk Halaman Dashboard
 */
// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Backend.dashboard');
    })->name('dashboard');

    Route::get('/profile', [SettingController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [SettingController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [SettingController::class, 'changePassword'])->name('profile.password');

});

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Packet
    Route::get('/packet', [PacketController::class, 'index'])->name('packet.index');
    Route::get('/packet/create', [PacketController::class, 'create'])->name('packet.create');
    Route::post('/packet', [PacketController::class, 'store'])->name('packet.store');
    Route::get('/packet/{packet}', [PacketController::class, 'edit'])->name('packet.edit');
    Route::patch('/packet/{packet}', [PacketController::class, 'update'])->name('packet.update');
    Route::delete('/packet/{packet}/delete', [PacketController::class, 'destroy'])->name('packet.destroy');

    // Program
    Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/program/{program}', [ProgramController::class, 'edit'])->name('program.edit');
    Route::patch('/program/{program}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/{program}/delete', [ProgramController::class, 'destroy'])->name('program.destroy');

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

    // Packet Combination
    Route::get('/packet-combination', [PacketCombinationController::class, 'index'])->name('packet.combination.index');
    Route::get('/packet-combination/create', [PacketCombinationController::class, 'create'])->name('packet.combination.create');
    Route::post('/packet-combination', [PacketCombinationController::class, 'store'])->name('packet.combination.store');
    Route::get('/packet-combination/{packetCombination}', [PacketCombinationController::class, 'edit'])->name('packet.combination.edit');
    Route::patch('/packet-combination/{packetCombination}', [PacketCombinationController::class, 'update'])->name('packet.combination.update');
    Route::delete('/packet-combination/{packetCombination}/delete', [PacketCombinationController::class, 'destroy'])->name('packet.combination.destroy');
    Route::patch('/packet-combinations/{id}/publish', [PacketCombinationController::class, 'publish'])->name('packet-combinations.publish');
    Route::patch('/packet-combinations/{id}/unpublish', [PacketCombinationController::class, 'unpublish'])->name('packet-combinations.unpublish');

     // Teacher Placement
    Route::get('/teacher-placement', [TeacherPlacementController::class, 'index'])->name('teacher.placement.index');
    Route::get('/teacher-placement/create', [TeacherPlacementController::class, 'create'])->name('teacher.placement.create');
    Route::post('/teacher-placement', [TeacherPlacementController::class, 'store'])->name('teacher.placement.store');
    Route::get('/teacher-placement/{teacherPlacement}', [TeacherPlacementController::class, 'edit'])->name('teacher.placement.edit');
    Route::patch('/teacher-placement/{teacherPlacement}', [TeacherPlacementController::class, 'update'])->name('teacher.placement.update');
    Route::delete('/teacher-placement/{teacherPlacement}/delete', [TeacherPlacementController::class, 'destroy'])->name('teacher.placement.destroy');

    Route::get('/teacher-meeting-attendance', [TeacherAttendanceController::class, 'index'])->name('teacher.meeting.attendance.index');
    Route::get('/teacher-meeting-attendance/{teacherPlacement}', [TeacherAttendanceController::class, 'show'])->name('teacher.meeting.attendance.show');

    // job vacancy
    Route::get('/job-vacancy', [JobController::class, 'index'])->name('job.vacancy.index');
    Route::get('/job-vacancy/create', [JobController::class, 'create'])->name('job.vacancy.create');
    Route::post('/job-vacancy', [JobController::class, 'store'])->name('job.vacancy.store');
    Route::get('/job-vacancy/{jobVacancy}', [JobController::class, 'edit'])->name('job.vacancy.edit');
    Route::patch('/job-vacancy/{jobVacancy}', [JobController::class, 'update'])->name('job.vacancy.update');
    Route::delete('/job-vacancy/{jobVacancy}/delete', [JobController::class, 'destroy'])->name('job.vacancy.destroy');

    // Job Application
    Route::get('/job-application', [JobApplicationController::class, 'index'])->name('job.application.index');
    Route::get('/job-application/{jobApplication}/edit', [JobApplicationController::class, 'edit'])->name('job.application.edit');
    Route::patch('/job-application/{jobApplication}', [JobApplicationController::class, 'update'])->name('job.application.update');
    Route::delete('/job-application/{jobApplication}/delete', [JobApplicationController::class, 'destroy'])->name('job.application.destroy');


    // promotion
    Route::get('/promotion', [promotionController::class, 'index'])->name('promotion.index');
    Route::get('/promotion/create', [promotionController::class, 'create'])->name('promotion.create');
    Route::post('/promotion', [promotionController::class, 'store'])->name('promotion.store');
    Route::get('/promotion/{promotion}', [promotionController::class, 'edit'])->name('promotion.edit');
    Route::patch('/promotion/{promotion}', [promotionController::class, 'update'])->name('promotion.update');
    Route::delete('/promotion/{promotion}/delete', [promotionController::class, 'destroy'])->name('promotion.destroy');
});

// Guru
Route::middleware(['auth', 'role:teacher'])->group(function () {
    // meeting setup
    Route::get('/meeting-setup', [MeetingSetupController::class, 'index'])->name('meeting.setup.index');
    Route::get('/meeting-setup/{teacherPlacement}', [MeetingSetupController::class, 'show'])->name('meeting.setup.show');
    Route::get('/meeting-setup/create', [MeetingSetupController::class, 'create'])->name('meeting.setup.create');
    Route::post('/meeting-setup', [MeetingSetupController::class, 'store'])->name('meeting.setup.store');
    Route::get('/meeting-setup/{teacherPlacement}/edit', [MeetingSetupController::class, 'edit'])->name('meeting.setup.edit');
    Route::patch('/meeting-setup/{teacherPlacement}', [MeetingSetupController::class, 'update'])->name('meeting.setup.update');
    Route::delete('/meeting-setup/{teacherPlacement}/delete', [MeetingSetupController::class, 'destroy'])->name('meeting.setup.destroy');

    // meeting attendance
    Route::get('/meeting-attendance', [MeetingAttendanceController::class, 'index'])->name('meeting.attendance.index');
    Route::get('/meeting-attendance/{meeting}', [MeetingAttendanceController::class, 'show'])->name('meeting.attendance.show');
    Route::get('/meeting-attendance/create', [MeetingAttendanceController::class, 'create'])->name('meeting.attendance.create');
    Route::post('/meeting-attendance', [MeetingAttendanceController::class, 'store'])->name('meeting.attendance.store');
    Route::get('/meeting-attendance/{meeting}/edit', [MeetingAttendanceController::class, 'edit'])->name('meeting.attendance.edit');
    Route::patch('/meeting-attendance/{meeting}', [MeetingAttendanceController::class, 'update'])->name('meeting.attendance.update');
    Route::delete('/meeting-attendance/{meeting}/delete', [MeetingAttendanceController::class, 'destroy'])->name('meeting.attendance.destroy');
    Route::get('/meeting/attendance/masuk/{meeting}', [MeetingAttendanceController::class, 'masuk'])->name('meeting.attendance.masuk');
    Route::get('/meeting/attendance/keluar/{meeting}', [MeetingAttendanceController::class, 'keluar'])->name('meeting.attendance.keluar');
});


/**
 * Routing for artisan
 */
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/artisan-optimize', function() {
    Artisan::call('optimize');
    return "Platform is optimize";
});


require __DIR__.'/auth.php';

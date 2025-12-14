<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meeting;
use App\Models\Teacher;
use App\Models\meetings;
use Illuminate\Http\Request;
use App\Models\TeacherPlacement;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MeetingAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teacher = Teacher::where('email', Auth::user()->email)->first();
        $teacherPlacements = TeacherPlacement::where('teacher_id', $teacher->id)->get();

        $selectedPlacementId = $request->input('teacher_placement_id');
        $meetings = [];

        if ($selectedPlacementId) {
            $meetings = Meeting::where('teacher_placement_id', $selectedPlacementId)->orderBy('order')->get();
        }

        return view('Backend.Teacher.Meeting.Attendance.index', compact('teacherPlacements', 'meetings', 'selectedPlacementId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(meetings $meetings) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(meeting $meeting)
    {
        return view('Backend.Teacher.Meeting.Attendance.edit', compact('meeting'));
    }

    /**
     * Update Daily Report
     */
    public function update(Request $request, meeting $meeting)
    {
        $meeting->update($request->all());

        return redirect()->route('meeting.attendance.index')->with('success', 'Meeting updated successfully');
    }

    public function masuk(Request $request, Meeting $meeting)
    {
        // Validasi lokasi (opsional, tapi disarankan)
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        $meeting->actual_start_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $meeting->actual_start_location = [
            'lat' => $request->latitude,
            'lng' => $request->longitude,
            'accuracy' => $request->accuracy,
            'device_info' => $request->device_info,
            'ip_address' => $request->ip(),
            'browser_info' => $request->header('User-Agent'),
            'timestamp' => Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString(),
        ];

        $meeting->save();

        $now = Carbon::now()->timezone('Asia/Jakarta');

        /** =========================
         * DATA KONTEKS
         * ========================= */
        $placement = $meeting->teacherPlacement;
        $teacherName = $placement->teacher->name ?? '-';
        $studentName = $placement->student->name ?? '-';
        $programName = $placement->packetCombination->program->name ?? '-';
        $levelName = $placement->packetCombination->lessonLevel->name ?? '-';

        /** =========================
         * KIRIM NOTIFIKASI
         * ========================= */
        $message =
            "✅ *ABSENSI MASUK GURU*\n\n" .
            "👤 Guru: *{$teacherName}*\n" .
            "📘 Program: {$programName} ({$levelName})\n" .
            "👨‍🎓 Siswa: {$studentName}\n\n" .
            "Pertemuan ke: {$meeting->order}\n" .
            "📅 Tanggal: {$now->translatedFormat('l, d F Y')}\n" .
            "🕒 Jam Masuk: {$now->format('H:i:s')}\n" .
            "Durasi pertemuan: {$meeting->duration_minutes} menit\n\n" .
            "Absensi masuk berhasil dicatat.";

        $this->sendWhatsappNotification($message);

        return response()->json(['success' => 'Berhasil melakukan absensi masuk!']);
    }

    public function keluar(Request $request, Meeting $meeting)
    {
        // Validasi lokasi
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        $meeting->actual_end_time = Carbon::now()->setTimezone('Asia/Jakarta');
        $now = Carbon::now()->timezone('Asia/Jakarta');

        $meeting->actual_end_location = [
            'lat' => $request->latitude,
            'lng' => $request->longitude,
            'accuracy' => $request->accuracy,
            'device_info' => $request->device_info,
            'ip_address' => $request->ip(),
            'browser_info' => $request->header('User-Agent'),
            'timestamp' => Carbon::now()->setTimezone('Asia/Jakarta')->toDateTimeString(),
        ];
        $meeting->attendance_status = $this->tentukanStatusAbsensi($meeting);
        $meeting->save();
        $meeting->refresh();


        /** =========================
         * DATA KONTEKS
         * ========================= */
        $placement = $meeting->teacherPlacement;
        $teacherName = $placement->teacher->name ?? '-';
        $studentName = $placement->student->name ?? '-';
        $programName = $placement->packetCombination->program->name ?? '-';
        $levelName = $placement->packetCombination->lessonLevel->name ?? '-';

        /** =========================
         * KIRIM NOTIFIKASI
         * ========================= */
        $message =
            "📌 *ABSENSI KELUAR GURU*\n\n" .
            "👤 Guru: *{$teacherName}*\n" .
            "📘 Program: {$programName} ({$levelName})\n" .
            "👨‍🎓 Siswa: {$studentName}\n\n" .
            "Pertemuan ke: {$meeting->order}\n" .
            "Durasi pertemuan: {$meeting->duration_minutes} menit\n\n" .
            "📅 Tanggal: {$now->translatedFormat('l, d F Y')}\n" .
            "🕒 Jam Masuk : {$meeting->actual_start_time->format('H:i:s')}\n" .
            "🕒 Jam Keluar: {$now->format('H:i:s')}\n\n" .
            "📊 Status Absensi: *{$meeting->attendance_status}*";

        $this->sendWhatsappNotification($message);

        return response()->json(['success' => 'Berhasil melakukan absensi keluar!']);
    }

    // TODO: Masih perlu didiskusikan lagi
    private function tentukanStatusAbsensi(Meeting $meeting): string
    {
        $status = 'Tidak Hadir';
        if (
            !$meeting->actual_start_time ||
            !$meeting->actual_end_time ||
            !$meeting->scheduled_start_time ||
            !$meeting->scheduled_end_time
        ) {
            $status = 'Tidak Hadir';
        }


        $scheduledDuration = strtotime($meeting->scheduled_end_time) - strtotime($meeting->scheduled_start_time);

        $actualDuration = strtotime($meeting->actual_end_time) - strtotime($meeting->actual_start_time);

        Log::info('ABSENSI DEBUG', [
            'scheduled' => $scheduledDuration,
            'actual' => $actualDuration
        ]);

        $tolerance = 60; // 1 menit (detik)

        $minAcceptable = $scheduledDuration - $tolerance;
        $maxAcceptable = $scheduledDuration + $tolerance;

        if ($minAcceptable <= 0) {
            $status = 'Tidak Hadir';
        }

        if ($actualDuration >= $minAcceptable && $actualDuration <= $maxAcceptable) {
            $status = 'Hadir';
        } elseif ($actualDuration < $minAcceptable) {
            $status = 'Kurang';
        } elseif ($actualDuration > $minAcceptable) {
            $status = 'Lebih';
        }

        Log::info('ABSENSI DEBUG', [
            'min_acceptable' => $minAcceptable,
            'max_acceptable' => $maxAcceptable,
            'scheduled' => $scheduledDuration,
            'actual' => $actualDuration,
            'tolerance' => $tolerance,
            'status' => $status
        ]);

        return $status;
    }

    private function sendWhatsappNotification(string $message): void
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'HmGYsX489W2hjzAjv7ce',
            ])->post('https://api.fonnte.com/send', [
                'target' => '082127236220',
                'message' => $message,
            ]);

            Log::info('WHATSAPP SENT', $response->json());
        } catch (\Throwable $e) {
            Log::error('WHATSAPP ERROR', [
                'message' => $e->getMessage()
            ]);
        }
    }
}

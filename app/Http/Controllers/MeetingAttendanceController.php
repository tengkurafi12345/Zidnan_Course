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
            $meetings = Meeting::where('teacher_placement_id', $selectedPlacementId)->get();
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
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meeting;
use App\Models\Teacher;
use App\Models\meetings;
use Illuminate\Http\Request;
use App\Models\TeacherPlacement;
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
    public function show(meetings $meetings)
    {

    }

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

    public function masuk(Meeting $meeting)
    {
        $meeting->actual_start_time = Carbon::now()->setTimezone('Asia/Jakarta'); // Waktu saat ini
        $meeting->save();

        return redirect()->route('meeting.attendance.index')
            ->with('success', 'Berhasil melakukan absensi masuk!');
    }

    public function keluar(Meeting $meeting)
    {
        $meeting->actual_end_time = Carbon::now()->setTimezone('Asia/Jakarta'); // Waktu saat ini
        $meeting->attendance_status = $this->tentukanStatusAbsensi($meeting); // Set status
        $meeting->save();

        return redirect()->route('meeting.attendance.index')
            ->with('success', 'Berhasil melakukan absensi keluar!');
    }

    // TODO: Masih perlu didiskusikan lagi
    private function tentukanStatusAbsensi(Meeting $meeting)
    {
        if (!$meeting->actual_start_time || !$meeting->actual_end_time) {
            return 'Belum';
        }

        $scheduledStart = Carbon::parse($meeting->scheduled_start_time);
        $scheduledEnd = Carbon::parse($meeting->scheduled_end_time);
        $actualStart = Carbon::parse($meeting->actual_start_time);
        $actualEnd = Carbon::parse($meeting->actual_end_time);

        $scheduledDuration = $scheduledEnd->diffInMinutes($scheduledStart);
        $actualDuration = $actualEnd->diffInMinutes($actualStart);

        if ($actualStart->eq($scheduledStart) && $actualEnd->eq($scheduledEnd)) {
            return 'Hadir';
        } elseif ($actualDuration < $scheduledDuration) {
            return 'Kurang';
        } elseif ($actualStart->gt($scheduledStart)) {
            return 'Mundur';
        }

        // Jika tidak memenuhi kondisi di atas, kembalikan status default
        return 'Belum';
    }
}

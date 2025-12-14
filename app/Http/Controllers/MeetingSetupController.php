<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meeting;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherPlacement;
use Illuminate\Support\Facades\Auth;

class MeetingSetupController extends Controller
{
    public function index()
    {
        $teacher = Teacher::where('email', Auth::user()->email)->firstOrFail();

        $teacherPlacements = TeacherPlacement::where('teacher_id', $teacher->id)
            ->with([
                'student',
                'packetCombination.lessonLevel',
                'packetCombination.program',
            ])
            ->get();

        return view('Backend.Teacher.Meeting.Setup.index', compact('teacherPlacements'));
    }

    public function show(TeacherPlacement $teacherPlacement)
    {
        $meetings = Meeting::where('teacher_placement_id', $teacherPlacement->id)->get()->sortBy('order');

        return view('Backend.Teacher.Meeting.Setup.show', compact(['teacherPlacement', 'meetings']));
    }

    public function edit(TeacherPlacement $teacherPlacement)
    {
        $meetings = Meeting::where('teacher_placement_id', $teacherPlacement->id)->get()->sortBy('order');

        return view('Backend.Teacher.Meeting.Setup.edit', compact(['teacherPlacement', 'meetings']));
    }

    public function update(Request $request, TeacherPlacement $teacherPlacement)
    {
        $request->validate([
            'meetings.*.scheduled_start_time' => 'nullable|date',
        ]);

        $meetingsData = $request->input('meetings');
        $clearAll = $request->input('clear_all') === 'true'; // Cek jika tombol clear_all diklik

        // Loop melalui data pertemuan
        foreach ($meetingsData as $key => $meetingData) {
            $meeting = Meeting::where('id', $key)
                ->where('teacher_placement_id', $teacherPlacement->id)
                ->firstOrFail();

            if ($clearAll) {
                // Jika tombol "Kosongkan Semua" diklik, kosongi semua jadwal
                $meeting->update([
                    'scheduled_start_time' => null,
                    'scheduled_end_time' => null,
                ]);
            } else {
                // Logika normal: cek apakah semua kosong atau update sebagian
                $allEmpty = true;
                foreach ($meetingsData as $data) {
                    if (!empty($data['scheduled_start_time'])) {
                        $allEmpty = false;
                        break;
                    }
                }

                if ($allEmpty) {
                    // Jika semua input kosong (tanpa klik tombol), kosongi semua
                    $meeting->update([
                        'scheduled_start_time' => null,
                        'scheduled_end_time' => null,
                    ]);
                } else {
                    // Update hanya yang ada nilai
                    if (!empty($meetingData['scheduled_start_time'])) {
                        $start = Carbon::parse($meetingData['scheduled_start_time']);
                        $end = $start->copy()->addMinutes($teacherPlacement->duration_minutes);

                        $meeting->update([
                            'scheduled_start_time' => $start->toDateTimeString(),
                            'scheduled_end_time' => $end->toDateTimeString(),
                        ]);
                    }
                    // Jika kosong, skip
                }
            }
        }

        // Redirect dengan pesan sukses
        $message = $clearAll ? 'Semua jadwal berhasil dikosongi.' : 'Data pertemuan berhasil diatur.';
        return redirect()->route('meeting.setup.index')
            ->with('success', $message);
    }
}

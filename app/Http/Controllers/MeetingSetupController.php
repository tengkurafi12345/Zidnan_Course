<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherPlacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::where('email', Auth::user()->email)->first();
        $teacherPlacements = TeacherPlacement::where('teacher_id', $teacher->id)->get();

        // dd($placementTeachers);
        return view('Backend.Teacher.Meeting.Setup.index', compact('teacherPlacements'));
    }


    /**
     * Display the specified resource.
     */
    public function show(TeacherPlacement $teacherPlacement)
    {
        return view('Backend.Teacher.Meeting.Setup.edit', compact('teacherPlacement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherPlacement $teacherPlacement)
    {
        return view('Backend.Teacher.Meeting.Setup.edit', compact('teacherPlacement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherPlacement $teacherPlacement)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'meetings.*.scheduled_start_time' => 'nullable',
            'meetings.*.scheduled_end_time' => 'nullable',
        ]);

        // Loop melalui data pertemuan yang dikirimkan
        foreach ($request->input('meetings') as $key => $meetingData) {
            // Ambil model Meeting yang sesuai (misalnya, berdasarkan ID jika ada, atau buat baru)
            $meeting = $teacherPlacement->meetings[$key];

            // Update atribut-atribut model Meeting
            $meeting->scheduled_start_time = $meetingData['scheduled_start_time'];
            $meeting->scheduled_end_time = $meetingData['scheduled_end_time'];

            // Simpan perubahan pada model Meeting
            $meeting->save();
        }

        // Redirect atau berikan response sesuai kebutuhan
        return redirect()->route('meeting.setup.index')
            ->with('success', 'Data pertemuan berhasil diatur.');
    }
}

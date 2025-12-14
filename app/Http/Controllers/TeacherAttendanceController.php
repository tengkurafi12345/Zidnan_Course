<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherPlacement;

class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teachers = Teacher::all();

        $seletTeacherId = $request->input('teacher_id');
        $teacherPlacements = [];

        if ($seletTeacherId) {
            $teacherPlacements = TeacherPlacement::where('teacher_id', $seletTeacherId)->get();
        }

        return view('Backend.Admin.TeacherAttendance.index', compact('teachers', 'teacherPlacements', 'seletTeacherId'));
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
    public function show(TeacherPlacement $teacherPlacement)
    {
        $meetings = Meeting::where('teacher_placement_id', $teacherPlacement->id)->get();

        return view('Backend.Admin.TeacherAttendance.show', compact('meetings'));
    }

    public function meetingDetail(Meeting $meeting)
    {
        return view('Backend.Admin.TeacherAttendance.meeting-detail', compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherPlacement $teacherPlacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherPlacement $teacherPlacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherPlacement $teacherPlacement)
    {
        //
    }
}

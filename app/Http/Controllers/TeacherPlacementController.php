<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TeacherPlacement;
use App\Models\PacketCombination;

class TeacherPlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherPlacements = TeacherPlacement::all()->sortByDesc('created_at');

        return view('Backend.Admin.TeacherPlacement.index', compact('teacherPlacements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packetCombinations = PacketCombination::all();
        $teachers = Teacher::all();
        $students = Student::all();

        return view('Backend.Admin.TeacherPlacement.create', compact(['packetCombinations', 'teachers', 'students']));
    }

    /**
     * Store a newly created resource in storage.
     * TODO: belum dibuatkan file validation requestnya
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'packet_combination_id' => 'required|exists:packet_combinations,id',
            'meeting_times' => 'required|numeric',
            'duration_minutes' => 'required|numeric',
        ]);

        // Buat Package Placement
        $placement = TeacherPlacement::create($validated);

        // Ambil jumlah meeting dari program terkait
        $meetingTimes = $validated['meeting_times'];

        // Buat data meeting sesuai meeting_times
        $meetings = [];
        for ($i = 0; $i < $meetingTimes; $i++) {
            $meetings[] = [
                'id' => Str::uuid()->toString(),
                'code' => Str::random(10),
                'duration_minutes' => $validated['duration_minutes'],
                'teacher_placement_id' => $placement->id,
                'scheduled_start_time' => null,
                'scheduled_end_time' => null,
                'actual_start_time' => null,
                'actual_end_time' => null,
                'attendance_status' => null,
                'location' => null,
                'daily_report' => null,
                'order' => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert ke tabel meetings dalam satu query
        Meeting::insert($meetings);

        return redirect()
            ->route('teacher.placement.index') // Arahkan ke halaman index
            ->with('success', 'Penempatan Guru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherPlacement $teacherPlacement)
    {
        //
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
     * TODO: Delete masih gagal
     */
    public function destroy(TeacherPlacement $teacherPlacement)
    {
        try {
              // Hapus semua meeting yang terkait dengan teacherPlacement
            $teacherPlacement->meetings()->delete();
            $teacherPlacement->delete();
            return redirect()->route('teacher.placement.index')
                ->with('success', 'Data penempatan guru berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.placement.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

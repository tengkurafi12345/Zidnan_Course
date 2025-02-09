<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all()->sortByDesc('created_at');

        return view('Backend.Teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::cases();
        return view('Backend.Teacher.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        Teacher::create($validatedData);

        return redirect()
            ->route('teacher.index') // Arahkan ke halaman index
            ->with('success', 'Guru berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $teacher = Teacher::find($teacher->id);
        $genders = Gender::cases();

        return view('Backend.Teacher.edit', compact('teacher', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $validatedData = $request->validated();

        try {
            $teacher->update($validatedData);
            return redirect()->route('teacher.index')
                ->with('success', 'Data guru berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.edit', $teacher->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            return redirect()->route('teacher.index')
                ->with('success', 'Data guru berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

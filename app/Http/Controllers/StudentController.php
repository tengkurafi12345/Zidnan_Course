<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all()->sortByDesc('created_at');
        return view('Backend.Student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::cases();

        return view('Backend.Student.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        Student::create($validatedData);

        return redirect()
            ->route('student.index') // Arahkan ke halaman index
            ->with('success', 'Siswa berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $genders = Gender::cases();

        return view('Backend.student.edit', compact('student', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->validated();

        try {
            $student->update($validatedData);
            return redirect()->route('student.index')
                ->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('student.edit', $student->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('student.index')
                ->with('success', 'Data guru berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('student.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

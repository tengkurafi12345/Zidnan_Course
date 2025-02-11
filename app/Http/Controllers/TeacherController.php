<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\Gender;
use App\Models\Teacher;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all()->sortByDesc('created_at');

        return view('Backend.Admin.Teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::cases();
        return view('Backend.Admin.Teacher.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;

        Teacher::create($validatedData);

        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'], // Email unik
            'password' => Hash::make('password'), // Password default
        ]);

        // Tetapkan role teacher ke user
        $user->assignRole($teacherRole);

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

        return view('Backend.Admin.Teacher.edit', compact('teacher', 'genders'));
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

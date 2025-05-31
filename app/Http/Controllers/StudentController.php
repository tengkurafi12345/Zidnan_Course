<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Guardians;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all()->sortByDesc('created_at');
        return view('Backend.Admin.Student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::cases();

        return view('Backend.Admin.Student.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        $student = Student::create($validatedData);

        // create guardians
        Guardians::create([
            'student_id' => $student->id,
            'name' => $validatedData['mother_name'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
        ]);

        $guardianRole = Role::firstOrCreate(['name' => 'guardian']);

        // create user account for guardian
        $user = User::create([
            'name' => $validatedData['mother_name'],
            'username' =>  $validatedData['mother_name'],
            'phone' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make('password')
        ]);

        $user->assignRole($guardianRole);

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

        return view('Backend.Admin.Student.edit', compact('student', 'genders'));
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

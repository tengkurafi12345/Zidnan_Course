<?php

namespace App\Http\Controllers;

use App\Enums\Gender;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string|max:255',
            'gender' => [
                'required',
                Rule::in(Gender::cases()),
            ],
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        return redirect()
            ->route('teacher.index')
            ->with('success', 'Guru berhasil dihapus.');
    }
}

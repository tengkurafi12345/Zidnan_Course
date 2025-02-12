<?php

namespace App\Http\Controllers\Main;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreTeacherRequest;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'asc')->limit(10)->get();
        return view('Frontend.guru', compact('teachers'));
    }


    public function form()
    {
        return view('Frontend.pendaftaran-guru');
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
            ->route('pendaftaran.guru.form') // Arahkan ke halaman index
            ->with('success', 'Guru berhasil dibuat.');
    }
}

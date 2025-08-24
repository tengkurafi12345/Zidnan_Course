<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Student;

class SiswaController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->limit(10)->get();

        return view('Frontend.siswa', compact('students'));
    }
}

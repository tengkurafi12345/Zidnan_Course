<?php

namespace App\Http\Controllers\Main;

use App\Models\student;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $students = student::orderBy('id', 'desc')->limit(10)->get();

        return view('Frontend.siswa', compact('students'));
    }
}

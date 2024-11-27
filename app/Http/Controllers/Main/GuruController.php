<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'asc')->limit(10)->get();
        return view('Frontend.guru', compact('teachers'));
    }
}

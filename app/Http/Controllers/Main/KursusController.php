<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Course;

class KursusController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'asc')->limit(10)->get();
        return view('Frontend.kursus', compact('courses'));
    }
}

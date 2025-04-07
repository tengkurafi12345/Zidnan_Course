<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;

class LowonganController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::paginate(10);
        return view('Frontend.lowongan', compact('jobVacancies'));
    }

    public function show(JobVacancy $jobVacancy)
    {
        $jobVacancy->load('responsibilities', 'qualifications');
        return view('Frontend.lowongan-detail', compact('jobVacancy'));
    }
}

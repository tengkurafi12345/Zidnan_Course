<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;

class LowonganController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::paginate(10);
        return view('frontend.lowongan', compact('jobVacancies'));
    }

    public function show(JobVacancy $jobVacancy)
    {
        $jobVacancy->load('responsibilities', 'qualifications');
        return view('frontend.lowongan-detail', compact('jobVacancy'));
    }
}

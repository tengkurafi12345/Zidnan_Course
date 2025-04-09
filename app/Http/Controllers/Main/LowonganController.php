<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobApplicantRequest;
use App\Http\Requests\StoreJobVacancyRequest;
use App\Models\JobApplicant;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;

class LowonganController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $jobVacancies = JobVacancy::paginate(10);
        return view('Frontend.lowongan', compact('jobVacancies'));
    }

    /**
     * @param JobVacancy $jobVacancy
     * @return View
     */
    public function show(JobVacancy $jobVacancy): View
    {
        $jobVacancy->load('responsibilities', 'qualifications');
        return view('Frontend.lowongan-detail', compact('jobVacancy'));
    }

    /**
     * @param StoreJobApplicantRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(StoreJobApplicantRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        $validatedData = $request->validated();
        $jobVacancyId = $validatedData['job_vacancy_id'];

        /** @var JobApplicant $jobApplicant */
        $jobApplicant = JobApplicant::create([
            "name" => $validatedData['name'],
            "email" => $validatedData['email'],
            "phone" => $validatedData['phone'],
            "address" => $validatedData['address'],
        ]);

        // job application
        /** @var JobApplication $jobApplication */
        $jobApplication = JobApplication::create([
            "job_vacancy_id" => $jobVacancyId,
            "job_applicant_id" => $jobApplicant->id,
            "resume_file" => null, // Todo: tambahkan logic agar dapat menyimpan file
            "cover_letter" => $validatedData['cover_letter'],
            "status" => "pending",
            "applied_at" => Carbon::now(),
        ]);

        DB::commit();

        return redirect()
            ->route('lowongan.detail', $jobVacancyId)
            ->with('success', 'Terima Kasih, Lamaran anda sudah berhasil diserahkan dan akan diproses, Ditunggu info selanjutnya via whastapp / email');
    }
}

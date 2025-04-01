<?php

namespace App\Http\Controllers;

use App\Enums\JobCategory;
use App\Enums\JobType;
use App\Enums\WorkPolicy;
use App\Http\Requests\StoreJobVacancyRequest;
use App\Http\Requests\UpdateJobVacancyRequest;
use App\Models\JobVacancy;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use JsonException;

class JobController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $jobVacancies = JobVacancy::all()->sortByDesc('created_at');

        return view('Backend.Admin.JobVacancy.index', compact('jobVacancies'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $categories = JobCategory::cases();
        $jobTypes = JobType::cases();
        $workPolicies = WorkPolicy::cases();

        return view('Backend.Admin.JobVacancy.create', compact(['categories', 'jobTypes',  'workPolicies']));
    }

    /**
     * @param StoreJobVacancyRequest $request
     * @return RedirectResponse
     * @throws JsonException
     */
    public function store(StoreJobVacancyRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['published_at'] = Carbon::now();
        $jobVacancy = JobVacancy::create($validatedData);

        // Menyimpan tanggung jawab
        $responsibilities = [];
        foreach ($request->responsibilities as $responsibility) {
            if (!empty($responsibility)) {
                $responsibilities[] = $responsibility; // Tambahkan ke array
            }
        }

        // Simpan sebagai JSON
        if (!empty($responsibilities)) {
            $jobVacancy->responsibilities()->create([
                'description' => $validatedData['responsibility_description'],
                'items' => json_encode($responsibilities, JSON_THROW_ON_ERROR)
            ]);
        }

        // Menyimpan kualifikasi
        $qualifications = [];
        foreach ($request->qualifications as $qualification) {
            if (!empty($qualification)) {
                $qualifications[] = $qualification; // Tambahkan ke array
            }
        }
        // Simpan sebagai JSON
        if (!empty($qualifications)) {
            $jobVacancy->qualifications()->create([
                'description' => $validatedData['qualification_description'],
                'items' => json_encode($qualifications, JSON_THROW_ON_ERROR)
            ]);
        }

        return redirect()
            ->route('job.vacancy.index') // Arahkan ke halaman index
            ->with('success', 'Lowongan Kerja berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
//    public function show(JobVacancy $jobVacancy)
//    {
//        //
//    }

    /**
     * @param JobVacancy $jobVacancy
     * @return View
     */
    public function edit(JobVacancy $jobVacancy): View
    {
        $jobVacancy->load('responsibilities', 'qualifications');

        $categories = JobCategory::cases();
        $jobTypes = JobType::cases();
        $workPolicies = WorkPolicy::cases();

        return view('Backend.Admin.JobVacancy.edit', compact(['jobVacancy', 'categories', 'jobTypes', 'workPolicies']));
    }

    /**
     * @param UpdateJobVacancyRequest $request
     * @param JobVacancy $jobVacancy
     * @return RedirectResponse
     */
    public function update(UpdateJobVacancyRequest $request, JobVacancy $jobVacancy): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            // Update data utama JobVacancy
            $jobVacancy->update($validatedData);

            // Mengupdate tanggung jawab
            // Hapus semua tanggung jawab yang ada
            $jobVacancy->responsibilities()->delete();

            // Tambahkan tanggung jawab baru
            $responsibilities = [];
            foreach ($request->responsibilities as $responsibility) {
                if (!empty($responsibility)) {
                    $responsibilities[] = $responsibility; // Tambahkan ke array
                }
            }

            // Simpan sebagai JSON jika ada tanggung jawab
            if (!empty($responsibilities)) {
                $jobVacancy->responsibilities()->create([
                    'description' => $request->responsibility_description,
                    'items' => json_encode($responsibilities, JSON_THROW_ON_ERROR)
                ]);
            }

            // Mengupdate kualifikasi
            // Hapus semua kualifikasi yang ada
            $jobVacancy->qualifications()->delete();

            // Tambahkan kualifikasi baru
            $qualifications = [];
            foreach ($request->qualifications as $qualification) {
                if (!empty($qualification)) {
                    $qualifications[] = $qualification; // Tambahkan ke array
                }
            }

            // Simpan sebagai JSON jika ada kualifikasi
            if (!empty($qualifications)) {
                $jobVacancy->qualifications()->create([
                    'description' => $request->qualification_description,
                    'items' => json_encode($qualifications, JSON_THROW_ON_ERROR)
                ]);
            }

            return redirect()->route('job.vacancy.index')
                ->with('success', 'Data lowongan kerja berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('job.vacancy.edit', $jobVacancy->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * @param JobVacancy $jobVacancy
     * @return RedirectResponse
     */
    public function destroy(JobVacancy $jobVacancy): RedirectResponse
    {
        try {
            // Cek apakah JobVacancy memiliki relasi dengan JobApplication
            if ($jobVacancy->job_applications()->exists()) {
                return redirect()->route('job.vacancy.index')
                    ->with('error', 'Tidak dapat menghapus lowongan kerja ini (' . $jobVacancy->title . ') karena sudah ada pelamar.');
            }

            // Hapus semua tanggung jawab yang terkait
            $jobVacancy->responsibilities()->delete();
            // Hapus semua kualifikasi yang terkait
            $jobVacancy->qualifications()->delete();

            // Hapus lowongan kerja itu sendiri
            $jobVacancy->delete();

            return redirect()->route('job.vacancy.index')
                ->with('success', 'Data Lowongan kerja beserta tanggung jawab dan kualifikasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('job.vacancy.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\StatusApplicant;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobApplicationController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $jobApplication = JobApplication::query()->orderByDesc('created_at')->paginate(10);

        return view('Backend.Admin.JobApplication.index', compact('jobApplication'));
    }

    /**
     * @param JobApplication $jobApplication
     * @return View
     */
    public function edit(JobApplication $jobApplication): View
    {
        $statuses = StatusApplicant::cases();

        return view('Backend.Admin.JobApplication.edit', compact(['jobApplication', 'statuses']));
    }

    /**
     * @param Request $request
     * @param JobApplication $jobApplication
     * @return RedirectResponse
     */
    public function update(Request $request, JobApplication $jobApplication): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                "status" => "required",
            ]);

            $jobApplication->update($validatedData);

            return redirect()->route('job.application.index')
                ->with('success', 'Status Pelamar berhasil diubah.!');
        } catch (\Exception $e) {
            return redirect()->route('job.application.index')
                ->with('error', 'Terjadi kesalahan saat mengedit data.');
        }
    }

    /**
     * @param JobApplication $jobApplication
     * @return RedirectResponse
     */
    public function destroy(JobApplication $jobApplication): RedirectResponse
    {
        try {
            // Hapus semua applicant yang terkait
            $jobApplication->jobApplicant()->delete();

            // Hapus lowongan kerja itu sendiri
            $jobApplication->delete();

            return redirect()->route('job.application.index')
                ->with('success', 'Data Pelamar berhasil dihapus.!');
        } catch (\Exception $e) {
            return redirect()->route('job.application.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

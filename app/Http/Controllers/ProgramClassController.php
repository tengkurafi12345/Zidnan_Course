<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramClasses\StoreProgramClassRequest;
use App\Http\Requests\ProgramClasses\UpdateProgramClassRequest;
use App\Models\ProgramClass;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use JsonException;

class ProgramClassController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $program_classes = ProgramClass::all()->sortByDesc('created_at');
        return view('Backend.Admin.ProgramClass.index', compact('program_classes'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('Backend.Admin.ProgramClass.create');
    }

    /**
     * @param StoreProgramClassRequest $request
     * @return RedirectResponse
     * @throws JsonException
     */
    public function store(StoreProgramClassRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // ubah list_features jadi JSON agar bisa masuk ke kolom list_of_content
        $validatedData['list_of_feature'] = json_encode($validatedData['list_of_feature'], JSON_THROW_ON_ERROR);

        $programClass = ProgramClass::create($validatedData);

        if ($request->hasFile('logo')) {
            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('PROGRAM_CLASSES', $filename, 'public');
            $programClass->update(['logo' => $path]);
        }

        return redirect()
            ->route('program-class.index') // Arahkan ke halaman index
            ->with('success', 'Kelas Program berhasil dibuat.');
    }

    /**
     * @param ProgramClass $programClass
     * @return void
     */
    public function show(ProgramClass $programClass): void
    {
        return ;
    }

    /**
     * @param ProgramClass $programClass
     * @return View
     */
    public function edit(ProgramClass $programClass): View
    {
        return view('Backend.Admin.ProgramClass.edit', compact('programClass'));
    }

    /**
     * @param UpdateProgramClassRequest $request
     * @param ProgramClass $programClass
     * @return RedirectResponse|null
     */
    public function update(UpdateProgramClassRequest $request, ProgramClass $programClass): ?RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            // Handle list_of_content
            $validatedData['list_of_content'] = $request->input('list_of_feature', []);

            // Handle Logo
            if ($request->hasFile('logo')) {
                // Hapus logo lama kalau ada
                if ($programClass->logo && Storage::disk('public')->exists($programClass->logo)) {
                    Storage::disk('public')->delete($programClass->logo);
                }

                // Upload logo baru
                $validatedData['logo'] = $request->file('logo')->store('PROGRAM_CLASSES', 'public');
            }

            $programClass->update($validatedData);

            return redirect()->route('program-class.index')
                ->with('success', 'Data kelas program berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('program-class.edit', $programClass->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * @param ProgramClass $programClass
     * @return RedirectResponse|null
     */
    public function destroy(ProgramClass $programClass): ?RedirectResponse
    {
        try {
            // cek apakah ada file logo di storage
            if ($programClass->logo && Storage::disk('public')->exists($programClass->logo)) {
                Storage::disk('public')->delete($programClass->logo);
            }

            $programClass->delete();

            return redirect()->route('program-class.index')
                ->with('success', 'Data Kelas Program berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('program-class.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

}

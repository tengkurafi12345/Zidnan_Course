<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonLevels\StoreLessonLevelRequest;
use App\Http\Requests\LessonLevels\UpdateLessonLevelRequest;
use App\Models\LessonLevel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LessonLevelController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $lessonLevels = LessonLevel::all()->sortByDesc('created_at');

        return view('Backend.Admin.LessonLevel.index', compact('lessonLevels'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('Backend.Admin.LessonLevel.create');
    }

    /**
     * @param StoreLessonLevelRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLessonLevelRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        LessonLevel::create($validatedData);

        return redirect()
            ->route('lesson.level.index') // Arahkan ke halaman index
            ->with('success', 'Jenjang Les berhasil dibuat.');
    }

    /**
     * @param LessonLevel $lessonLevel
     * @return void
     */
    public function show(LessonLevel $lessonLevel): void
    {
        return;
    }

    /**
     * @param LessonLevel $lessonLevel
     * @return View
     */
    public function edit(LessonLevel $lessonLevel): View
    {
        return view('Backend.Admin.LessonLevel.edit', compact('lessonLevel'));
    }

    /**
     * @param UpdateLessonLevelRequest $request
     * @param LessonLevel $lessonLevel
     * @return RedirectResponse
     */
    public function update(UpdateLessonLevelRequest $request, LessonLevel $lessonLevel): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            $lessonLevel->update($validatedData);
            return redirect()->route('lesson.level.index')
                ->with('success', 'Data jenjang les berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('lesson.level.edit', $lessonLevel->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * @param LessonLevel $lessonLevel
     * @return RedirectResponse
     */
    public function destroy(LessonLevel $lessonLevel): RedirectResponse
    {
        try {
            $lessonLevel->delete();
            return redirect()->route('lesson.level.index')
                ->with('success', 'Data jenjang les berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('lesson.level.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

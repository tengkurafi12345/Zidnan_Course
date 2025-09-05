<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProgramController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $programs = Program::all()->sortByDesc('created_at');

        return view('Backend.Admin.Program.index', compact('programs'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('Backend.Admin.Program.create');
    }

    /**
     * @param StoreProgramRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProgramRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        Program::create($validatedData);

        return redirect()
            ->route('program.index') // Arahkan ke halaman index
            ->with('success', 'Program berhasil dibuat.');
    }

    /**
     * @param Program $program
     * @return void
     */
    public function show(Program $program): void
    {
        return;
    }

    /**
     * @param Program $program
     * @return View
     */
    public function edit(Program $program): View
    {
        return view('Backend.Admin.Program.edit', compact('program'));
    }

    /**
     * @param UpdateProgramRequest $request
     * @param Program $program
     * @return RedirectResponse
     */
    public function update(UpdateProgramRequest $request, Program $program): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            $program->update($validatedData);
            return redirect()->route('program.index')
                ->with('success', 'Data program berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('program.edit', $program->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * @param Program $program
     * @return RedirectResponse
     */
    public function destroy(Program $program): RedirectResponse
    {
        try {
            $program->delete();
            return redirect()->route('program.index')
                ->with('success', 'Data program berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('program.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

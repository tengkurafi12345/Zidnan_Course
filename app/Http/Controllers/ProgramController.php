<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all()->sortByDesc('created_at');

        return view('Backend.Program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        Program::create($validatedData);

        return redirect()
            ->route('program.index') // Arahkan ke halaman index
            ->with('success', 'Program berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('Backend.Program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, Program $program)
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
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
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

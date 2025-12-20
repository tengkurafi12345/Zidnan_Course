<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use Illuminate\Http\Request;

class AcademicPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicPeriods = AcademicPeriod::all()->sortByDesc('created_at');

        return view('Backend.Admin.AcademicPeriod.index', compact('academicPeriods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Admin.AcademicPeriod.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        AcademicPeriod::create($validated);

        return redirect()->route('academic.period.index')->with('success', 'Academic Period created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicPeriod $academicPeriod)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicPeriod $academicPeriod)
    {
        return view('Backend.Admin.AcademicPeriod.edit', compact('academicPeriod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicPeriod $academicPeriod)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        $academicPeriod->update($validated);

        return redirect()->route('academic.period.index')->with('success', 'Academic Period updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicPeriod $academicPeriod)
    {
        $academicPeriod->delete();

        return redirect()->route('academic.period.index')->with('success', 'Academic Period deleted successfully.');
    }
}

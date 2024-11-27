<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Backend.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.course.create');
    }

    /**
     * Menyimpan data baru ke tabel courses.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:255|unique:courses,code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'estimate_time' => 'required|date|date_format:Y-m-d\TH:i',
            'is_active' => 'required|boolean',
            'category_id' => 'required|exists:course_categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        $validatedData['estimate_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['estimate_time']);

        Course::create($validatedData);

        return redirect()
            ->route('course.index') // Arahkan ke halaman index
            ->with('success', 'Kursus berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}

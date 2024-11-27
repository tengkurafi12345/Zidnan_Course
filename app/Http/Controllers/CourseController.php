<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('Backend.course.index', compact('courses'));
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
            'description' => 'nullable|string|max:255',
            'estimate_time' => 'required|date|date_format:Y-m-d\TH:i',
            'is_active' => 'required|boolean',
            'category_id' => 'required',
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
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('Backend.course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(), [
            'code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('courses', 'code')->ignore($course->id),
            ],
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'estimate_time' => 'required|date|date_format:Y-m-d\TH:i',
            'is_active' => 'required|boolean',
            'category_id' => 'required',
        ]);


        // Jika validasi gagal, kembalikan respons error
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Ambil data yang divalidasi
        $validatedData = $validator->validated();

        // Konversi estimate_time ke format database (Y-m-d H:i:s)
        $validatedData['estimate_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['estimate_time']);

        // Perbarui data ke database
        $course->update($validatedData);

        return redirect()->route('course.index')->with('success', 'Course updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari course berdasarkan ID
        $course = Course::findOrFail($id);

        // Menghapus course
        $course->delete();

        // Menambahkan flash message untuk menunjukkan bahwa data berhasil dihapus
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Main;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'asc')->limit(10)->get();
        return view('Frontend.testimoni', compact('testimonials'));
    }
}

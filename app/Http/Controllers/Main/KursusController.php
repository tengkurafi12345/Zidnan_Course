<?php

namespace App\Http\Controllers\Main;

use App\Models\Course;
use App\Models\PacketCombination;
use App\Http\Controllers\Controller;

class KursusController extends Controller
{
    public function index()
    {
        $packetCombinations = PacketCombination::all();

        // $courses = Course::orderBy('id', 'asc')->limit(10)->get();
        return view('Frontend.kursus', compact('packetCombinations'));
    }
}

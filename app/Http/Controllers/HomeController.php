<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LessonLevel;
use App\Models\PacketCombination;
use App\Models\ProgramClass;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $programPrivate = ProgramClass::where("name", "Les Private")->first();
        $programBimbel = ProgramClass::where("name", "Les Bimbel")->first();
        $programSantriWeekend = ProgramClass::where("name", "Santri Weekend")->first();
        $programCorporateQuran = ProgramClass::where("name", "Perusahaan Mengaji")->first();

        $lessonLevel = LessonLevel::whereHas('packetCombinations', function ($query) {
            $query->where('published_on', true);
        })->with('packetCombinations')->get();

        $packetCombination = PacketCombination::where('published_on', true)->with('program', 'lessonLevel')->get();
        // Kelompokkan berdasarkan nama paket
        $groupedPackets = $packetCombination->groupBy('lessonLevel.name');


        // Ambil data sesuai kriteria
        $privateLessons = $groupedPackets->filter(fn($lessonLevel, $key) => str_contains($key, 'Private'))->flatten()->take(4);
        $bimbelLessons = $groupedPackets->filter(fn($lessonLevel, $key) => str_contains($key, 'Bimbel'))->flatten()->take(4);
        $santriWeekend = $groupedPackets->filter(fn($lessonLevel, $key) => str_contains($key, 'Santri Weekend'))->flatten()->take(3);
        $corporateQuran = $groupedPackets->filter(fn($lessonLevel, $key) => str_contains($key, 'Perusahaan Mengaji'))->flatten()->take(1);

        $students = Student::orderBy('created_at', 'desc')->limit(3)->get();

        return view('Frontend.index', compact([
            'privateLessons',
            'bimbelLessons',
            'santriWeekend',
            'corporateQuran',
            'programPrivate',
            'programBimbel',
            'programSantriWeekend',
            'programCorporateQuran',
            'students'
        ]));
    }


    public function mengaji() {
        $packets = LessonLevel::all()->sortByDesc('created_at');
        $students = Student::orderBy('created_at', 'desc')->limit(3)->get();

        return view('Frontend.mengaji', compact(['packets', 'students']));
    }
}

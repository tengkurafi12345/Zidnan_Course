<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Packet;
use App\Models\PacketCombination;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
//        $packets = Packet::whereHas('packe__tCombinations', function ($query) {
//            $query->where('published_on', true);
//        })->with('packetCombinations')->get();

        $packetCombination = PacketCombination::where('published_on', true)->with('program', 'packet')->get();
//        dd($packetCombination);
        // Kelompokkan berdasarkan nama paket
        $groupedPackets = $packetCombination->groupBy('packet.name');
//
////        dd($groupedPackets->keys());
//        // Ambil data sesuai kriteria
        $privateLessons = $groupedPackets->filter(fn($packets, $key) => str_contains($key, 'Private'))->flatten()->take(4);
        $bimbelLessons = $groupedPackets->filter(fn($packets, $key) => str_contains($key, 'Bimbel'))->flatten()->take(4);
        $santriWeekend = $groupedPackets->filter(fn($packets, $key) => str_contains($key, 'Santri Weekend'))->flatten()->take(3);
        $corporateQuran = $groupedPackets->filter(fn($packets, $key) => str_contains($key, 'Perusahaan Mengaji'))->flatten()->take(1);

        $students = Student::orderBy('created_at', 'desc')->limit(3)->get();

        return view('Frontend.index', compact([
            'privateLessons',
            'bimbelLessons',
            'santriWeekend',
            'corporateQuran',
            'students'
        ]));
    }


    public function mengaji() {
        $packets = Packet::all()->sortByDesc('created_at');
        $students = Student::orderBy('created_at', 'desc')->limit(3)->get();

        return view('Frontend.mengaji', compact(['packets', 'students']));
    }
}

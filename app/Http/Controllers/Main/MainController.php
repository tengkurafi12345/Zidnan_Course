<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\PacketCombination;

class MainController extends Controller
{
    public function index()
    {
        // susunananya paket kombinasi terdiri dari 1 paket banyak program
        // dan 1 paket banyak materi
        $packetCombinations = PacketCombination::all();

        return view('Frontend.kursus', compact('packetCombinations'));
    }
}

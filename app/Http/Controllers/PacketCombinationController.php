<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacketCombinationRequest;
use App\Models\Packet;
use App\Models\PacketCombination;
use App\Models\Program;
use Illuminate\Http\Request;

class PacketCombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packetCombinations = PacketCombination::all()->sortByDesc('created_at');
        return view('Backend.Admin.PacketCombination.index', compact('packetCombinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packets = Packet::all();
        $programs = Program::all();
        return view('Backend.Admin.PacketCombination.create', compact(['packets', 'programs']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacketCombinationRequest $request)
    {
        $validatedData = $request->validated();

        PacketCombination::create($validatedData);

        return redirect()
            ->route('packet.combination.index') // Arahkan ke halaman index
            ->with('success', 'Guru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PacketCombination $packetCombination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PacketCombination $packetCombination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PacketCombination $packetCombination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PacketCombination $packetCombination)
    {
        try {
            $packetCombination->delete();
            return redirect()->route('packet.combination.index')
                ->with('success', 'Data paket kombinasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('packet.combination.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

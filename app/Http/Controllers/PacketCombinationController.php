<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacketCombinationRequest;
use App\Http\Requests\UpdatePacketCombinationRequest;
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
        $programs = Program::all()->sortBy('name');
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

    public function publish($id)
    {
        $packetCombination = PacketCombination::findOrFail($id);
        $packetCombination->update(['published_on' => true]);

        return redirect()->back()->with('success', 'Packet successfully published.');
    }

    public function unpublish($id)
    {
        $packetCombination = PacketCombination::findOrFail($id);
        $packetCombination->update(['published_on' => false]);

        return redirect()->back()->with('success', 'Packet successfully unpublished.');
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
        $packets = Packet::all();
        $programs = Program::all()->sortBy('name');

        return view('Backend.Admin.PacketCombination.edit', compact(['packets', 'programs', 'packetCombination']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacketCombinationRequest $request, PacketCombination $packetCombination)
    {
        $validatedData = $request->validated();

        try {
            $packetCombination->update($validatedData);
            return redirect()->route('packet.combination.index')
                ->with('success', 'Data paket kombinasi berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('packet.combination.edit', $packetCombination->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
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

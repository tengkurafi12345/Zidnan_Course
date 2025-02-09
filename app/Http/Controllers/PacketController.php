<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use App\Http\Requests\StorePacketRequest;
use App\Http\Requests\UpdatePacketRequest;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packets = Packet::all()->sortByDesc('created_at');

        return view('Backend.packet.index', compact('packets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.packet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacketRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['status'] = 1;
        Packet::create($validatedData);

        return redirect()
            ->route('packet.index') // Arahkan ke halaman index
            ->with('success', 'Guru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Packet $packet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Packet $packet)
    {
        return view('Backend.Packet.edit', compact('packet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacketRequest $request, Packet $packet)
    {
        $validatedData = $request->validated();

        try {
            $packet->update($validatedData);
            return redirect()->route('packet.index')
                ->with('success', 'Data paket berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('packet.edit', $packet->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Packet $packet)
    {
        try {
            $packet->delete();
            return redirect()->route('packet.index')
                ->with('success', 'Data paket berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('packet.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}

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
    public function index(Request $request)
    {
        $query = PacketCombination::with(['packet', 'program']);

        // Pencarian (bekerja sendiri)
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('packet', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%');
                })
                    ->orWhereHas('program', function ($q) use ($request) {
                        $q->where('name', 'LIKE', '%' . $request->search . '%');
                    });
            });
        }

        // Filter Paket (bekerja sendiri)
        if ($request->filled('packet_id')) {
            $query->where('packet_id', $request->packet_id);
        }

        // Filter Publish (bekerja sendiri)
        if ($request->filled('publish')) {
            $query->where('published_on', $request->publish);
        }

        // Filter Status (bekerja sendiri)
        if ($request->filled('filter_status')) {
            $query->where('status', $request->filter_status);
        }

        // Sorting
        $sortBy = $request->input('sort_by', 'created_at'); // Default sort by created_at
        $sortDirection = $request->input('sort_order', 'asc'); // Default sort direction

        if ($sortBy) {
            if ($sortBy == 'packet') {
                $query->join('packets', 'packet_combinations.packet_id', '=', 'packets.id')
                    ->orderBy('packets.name', $sortDirection);
            } elseif ($sortBy == 'program') {
                $query->join('programs', 'packet_combinations.program_id', '=', 'programs.id')
                    ->orderBy('programs.name', $sortDirection);
            } elseif ($sortBy == 'price') {
                $query->orderBy('price', $sortDirection);
            } elseif ($sortBy == 'published_on') {
                $query->orderBy('published_on', $sortDirection);
            } elseif ($sortBy == 'status') {
                $query->orderBy('status', $sortDirection);
            }
        } else {
            $query->orderBy('created_at', 'desc'); // Default order
        }


        $packetCombinations = $query->paginate(10);
        $packets = Packet::all();

        return view('Backend.Admin.PacketCombination.index', compact('packetCombinations', 'packets'));
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

        $validatedData['status'] = 1;

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

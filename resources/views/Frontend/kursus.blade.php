@extends('layouts.main')

@section('title', 'Kursus')

@section('content')
@php
    $groupedCombinations = [];
    foreach ($packetCombinations as $combination) {
        $packetName = $combination->packet->name; // Asumsi ada relasi `packet` di model `PacketCombination`
        $programName = $combination->program->name; // Asumsi ada relasi `program` di model `PacketCombination`
        $packetPrice = $combination->packet->price; // Ambil harga paket

        if (!isset($groupedCombinations[$packetName])) {
            $groupedCombinations[$packetName] = [
                'programs' => [],
                'price' => $packetPrice, // Simpan harga paket
            ];
        }
        $groupedCombinations[$packetName]['programs'][] = $programName;
    }
@endphp
    <header>
        <h1>Halaman Paket Bimbel</h1>
    </header>
    @foreach ($groupedCombinations as $packetName => $packetData)
        <h2 style="margin: 2rem">{{ $packetName }}</h2>

        <!-- Content -->
        <!---------- Daftar Paket Bimbel ------->
        @foreach ($packetData['programs'] as $programName)

        <div class="course-container" style="margin-top: 30px">
            {{-- {{ dd($packetCombination) }} --}}
                <div class="course-package">
                    {{-- <img src="{{ asset('img/Bahasa_Arab.jpg') }}" alt="Gambar Paket Bahasa Arab" title="Paket Bahasa Arab"> --}}
                    {{-- <p>{{ \Illuminate\Support\Str::limit($course->description, 150) }}</p> --}}
                    {{-- <p>Harga: Rp.{{ number_format($packetData['price'], 0, ',', '.') }}/bulan</p> --}}
                    <p>Daftar Program:</p>
                    <ul>
                            <li>{{ $programName }}</li>
                    </ul>
                    <button onclick="redirectToWhatsApp('{{ $programName }}')">Gabung Sekarang!</button>
                </div>
        </div>
        @endforeach


    @endforeach

@endsection

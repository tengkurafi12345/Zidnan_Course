@extends('layouts.main')

@section('title', 'Kursus')

@section('content')
@php
    $groupedCombinations = [];
    foreach ($packetCombinations as $combination) {
        $packetName = $combination->packet->name;
        $programName = $combination->program->name;
        $packetPrice = $combination->price;
        $status = $combination->status;

        if (!isset($groupedCombinations[$packetName])) {
            $groupedCombinations[$packetName] = [
                'programs' => [],
                'price' => $packetPrice,
                'status' => $status
            ];
        }
        $groupedCombinations[$packetName]['programs'][] = $programName;
    }
@endphp

<header>
    <h1>Halaman Paket Bimbel</h1>
</header>


@foreach ($groupedCombinations as $packetName => $packetData)
    <h2 class="packet-title">{{ $packetName }}</h2>
    <div class="course-container">
        @foreach ($packetData['programs'] as $programName)
            <div class="course-package">
                <p class="program-name">{{ $programName }}</p>
                <p class="price">Harga: Rp.{{ number_format($packetData['price'], 0, ',', '.') }}/bulan</p>
                @if($packetData['status'])
                    <button onclick="redirectToWhatsApp('{{ $programName }}')" >Gabung Sekarang!</button>
                @else
                    <button disabled class="btn btn-danger">Paket Tidak Aktif</button>
                @endif
            </div>
        @endforeach
    </div>
@endforeach
@endsection

<style>
    .course-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        max-width: 1200px;
        margin: auto;
    }
    .course-package {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        width: calc(25% - 20px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .packet-title {
        text-align: start;
        margin: 2rem;
    }
    .program-name {
        font-size: 1.2em;
        font-weight: bold;
        color: #7400a1;
    }
    .price {
        color: #515052;
    }
    .course-package button {
        background-color: #7400a1;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    .course-package button:hover {
        background-color: #b500fd;
    }
    @media (max-width: 1024px) {
        .course-package {
            width: calc(50% - 20px);
        }
    }
    @media (max-width: 768px) {
        .course-package {
            width: 100%;
        }
    }
</style>

@extends('layouts.main')

@section('title', 'Halaman Detail Promo')

@section('content')
    @php
        Carbon\Carbon::setLocale('id');
        $start = Carbon\Carbon::parse($promotion->start_date)->translatedFormat('d F Y');
        $end = Carbon\Carbon::parse($promotion->end_date)->translatedFormat('d F Y');
    @endphp
    <div class="container py-5 mt-5">
        <!-- Card Promo -->
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <!-- Gambar Header -->
            <div class="ratio ratio-21x9">
                <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="w-100 h-100 object-fit-cover" alt="Promo Banner">
            </div>

            <!-- Konten Promo -->
            <div class="card-body px-4 py-5 text-center bg-light">
                <!-- Nama Promo -->
                <h1 class="fw-bold text-purple mb-3">{{ $promotion->name }}</h1>

                <!-- Diskon -->
                <div class="bg-warning-subtle border border-warning p-4 rounded-3 d-inline-block mb-4">
                    <h5 class="fw-bold text-warning mb-1 text-uppercase">Diskon Tambahan</h5>
                    <h1 class="fw-bold text-dark display-5">Rp{{ number_format($promotion->discount, 0, ',', '.') }}</h1>
                    <small class="text-muted">Min. Pembelian Rp{{ number_format($promotion->discount ?? 0, 0, ',', '.') }}</small>
                </div>

                <!-- Kode Kupon -->
                <div class="mt-3 mb-4">
                    <div class="d-inline-flex border border-purple rounded-pill overflow-hidden shadow-sm">
                        <span class="bg-purple text-white px-3 py-2 fw-semibold">Kode</span>
                        <span id="promo-code"  class="bg-white text-purple px-4 py-2 fw-bold" style="letter-spacing: 1px; cursor: pointer;" onclick="copyPromoCode()">
                        {{ $promotion->code_voucher }}
                    </span>
                    </div>
                </div>

                <!-- Masa Berlaku -->
                <p class="text-danger fst-italic">Berlaku: {{ $start }} - {{ $end }}</p>
            </div>

            <!-- Syarat & Ketentuan -->
            <div class="card-footer bg-white px-4 py-4">
                <h5 class="fw-semibold text-purple mb-3">Syarat & Ketentuan</h5>
                <ul class="list-group list-group-flush">
                    @foreach ($promotion->term_and_conditions as $term)
                        <li class="list-group-item"><i class="fa-solid fa-angles-right fs-6 text-purple"></i> {{ $term }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Button Back -->
        <div class="mt-4 text-center">
            <a href="{{ route('promo.index') }}" class="btn btn-purple border-0 shadow-lg rounded-4 overflow-hidden">Kembali</a>
        </div>
    </div>

    <script>
        function copyPromoCode() {
            const promoCode = document.getElementById("promo-code").innerText;
            navigator.clipboard.writeText(promoCode).then(function () {
                alert('Kode berhasil disalin: ' + promoCode);
            }, function (err) {
                alert('Gagal menyalin kode!');
            });
        }
    </script>
@endsection

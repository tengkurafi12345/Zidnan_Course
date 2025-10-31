@extends('layouts.main')

@section('title', 'Detail Promo')

@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
        $start = Carbon::parse($promotion->start_date)->translatedFormat('d F Y');
        $end = Carbon::parse($promotion->end_date)->translatedFormat('d F Y');

        // URL Google Form
        $googleFormBaseUrl = "https://docs.google.com/forms/d/e/1FAIpQLSfEIbHBnA4jMEdn27cLhjNNvrMwOrBggIlkV1JgTYVQUFrqvQ/viewform";
        $kodeKuponField = "entry.580099924"; // ID kolom Google Form untuk kode promo
        $formUrl = "{$googleFormBaseUrl}?{$kodeKuponField}={$promotion->code_voucher}";
    @endphp

    <style>
        .promo-hero {
            background: linear-gradient(135deg, #d42acc, #a66bbe);
            color: #fff;
            text-align: center;
            padding: 60px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .promo-hero .promo-header img {
            width: 100%;
            height: auto;
            border-radius: 16px;
            margin-bottom: 20px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.25);
            object-fit: contain; /* biar seluruh gambar tampil utuh */
        }


        .promo-code-box {
            background: #fff;
            color: #d42acc;
            font-weight: 700;
            border-radius: 50px;
            display: inline-block;
            padding: 10px 40px;
            letter-spacing: 1px;
            border: 2px dashed #d42acc;
            font-size: 1.4rem;
            margin: 10px 0 25px;
        }

        .btn-register {
            background: linear-gradient(90deg, #d42acc, #a66bbe);
            border: 5px solid #fff;
            color: #fff;
            font-weight: 600;
            padding: 16px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 18px rgba(212, 42, 204, 0.3);
        }

        .btn-register:hover {
            background: linear-gradient(90deg, #a66bbe, #d42acc);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 42, 204, 0.4);
        }

        .btn-back {
            border: 2px solid #d42acc;
            color: #d42acc;
            font-weight: 600;
            padding: 14px 36px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #d42acc;
            color: #fff;
        }

        .promo-terms {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.05);
            padding: 30px 40px;
            margin-top: 40px;
        }

        .promo-terms h5 {
            color: #d42acc;
            font-weight: 700;
        }

        .promo-terms li {
            padding: 8px 0;
            border: none;
        }

        .promo-terms i {
            color: #d42acc;
        }
    </style>

    <div class="container py-5 mt-5" style="margin-top: 7rem !important;">

        <!-- Promo Highlight Section -->
        <div class="promo-hero shadow-lg">
            <div class="promo-header position-relative w-100">
                <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}"
                     alt="Promo Banner"
                     class="img-fluid mx-auto d-block w-100"
                     style="height: auto; max-width: 100%; border-radius: 16px;">
            </div>
            <h1 class="fw-bold mb-3">{{ $promotion->name }}</h1>
            <p class="mb-3">Nikmati diskon spesial hingga:</p>

            <h2 class="fw-bold display-6 mb-2">Rp{{ number_format($promotion->discount, 0, ',', '.') }}</h2>
            <p class="text-light mb-4">Periode: {{ $start }} – {{ $end }}</p>

            <div class="promo-code-box">
                {{ $promotion->code_voucher }}
            </div>

            <div class="mt-4">
                <a href="{{ $formUrl }}" target="_blank" class="btn btn-register">
                    <i class="fa-solid fa-ticket me-2"></i> Daftar Menggunakan Kode
                </a>
            </div>
        </div>

        <!-- Syarat & Ketentuan -->
        <div class="promo-terms">
            <h5 class="mb-3">Syarat & Ketentuan</h5>
            <ul class="list-group list-group-flush">
                @foreach ($promotion->term_and_conditions as $term)
                    <li class="list-group-item">
                        <i class="fa-solid fa-angles-right me-2"></i> {{ $term }}
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Button Back -->
        <div class="mt-5 text-center">
            <a href="{{ route('promo.index') }}" class="btn btn-back">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Daftar Promo
            </a>
        </div>
    </div>
@endsection

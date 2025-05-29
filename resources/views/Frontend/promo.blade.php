@extends('layouts.main')

@section('title', 'Halaman Promo')

@section('content')

    <style>
        /* Carousel dan gambar di kiri */
        .carousel,
        .carousel-inner,
        .carousel-item {
            height: 100%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            border-radius: 20px;
            background-color: #8e44ad !important;
        }

        .carousel-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #8e44ad;
        }
    </style>
    @if($leftHeaders->isNotEmpty() || $rightHeaders->isNotEmpty())
        <header class="bg-none">
            <div class="container py-4">
                <div class="row g-3 align-items-stretch">
                    <!-- Left 60% -->
                    <div class="col-lg-7 col-md-12">
                        <div id="promoCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner h-100 rounded overflow-hidden border border-purple">
                                @foreach($leftHeaders as $index => $item)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }} h-100">
                                        <a href="{{ route('promo.show', $item->id) }}">
                                            <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="d-block w-100 h-100 object-fit-cover" alt="{{ $item->name }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Right 40% -->
                    <div class="col-lg-5 col-md-12">
                        <div class="d-flex flex-column gap-3 h-100">
                            @foreach($rightHeaders as $item)
                                <a href="{{ route('promo.show', $item->id) }}" class="h-50">
                                    <div class="ratio ratio-21x9 h-100 rounded overflow-hidden shadow-sm border border-purple">
                                        <img src="{{ asset('img/atas.png') }}" class="w-100 h-100 object-fit-cover" alt="{{ $item->name }}">
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @else
        <header >
            <h1>Halaman Promo & Info</h1>
        </header>
    @endif

    <!-- List Promo -->
    <section class="testimonial-section">
        <h2 class="fw-bold">Promo & Info</h2>
        @if($promotions->isEmpty())
            <div class="alert alert-warning" role="alert">
                <strong>Data Kosong!</strong> Saat ini tidak ada promo yang tersedia.
            </div>
        @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($promotions as $promo)
                @php
                    Carbon\Carbon::setLocale('id');
                    $start = Carbon\Carbon::parse($promo->start_date)->translatedFormat('d F Y');
                    $end = Carbon\Carbon::parse($promo->end_date)->translatedFormat('d F Y');
                @endphp
                <div class="col">
                    <div class="card shadow-sm border">
                        <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                        <div class="card-body text-start">
                            <a href="{{ route('promo.show', $promo->id) }}" class="text-decoration-none text-purple"> <p class="card-text fw-bold"> {{ $promo->name }}</p></a>
                            <p class="text-secondary fst-italic">Berlaku: {{ $start }} - {{ $end }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Menambahkan pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $promotions->links('vendor.pagination.bootstrap-5') }}
        </div>
         @endif
    </section>
@endsection

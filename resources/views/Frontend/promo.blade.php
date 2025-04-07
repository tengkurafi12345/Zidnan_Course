@extends('layouts.main')

@section('title', 'Halaman Promo')

@section('content')
    <style>
        header {
            background-image: none;

        }
        .split-container {
            max-height: 350px;
        }

        .col-md-7, .col-md-5 {
            max-height: 350px;
        }

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

        /* Gambar di kanan */
        .left-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            gap: 10px;
        }

        .left-container img {
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #8e44ad;
        }
    </style>
    <header>
        <div class="container">
            <div class="row split-container">
                <!-- Left 60% -->
                <div class="col-md-7">
                    <div id="promoCarousel" class="carousel slide flex-grow-1" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" alt="Hall of Friends">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/Template-Image-Carousel-Custom2.png') }}" alt="Promo Buku Anak">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" alt="Voucher Bank">
                            </div>
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
                <div class="col-md-5">
                    <div class="left-container">
                        <img src="{{ asset('img/atas.png') }}" alt="Promo Buku Anak">
                        <img src="{{ asset('img/bawah.png') }}" alt="Voucher Bank">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- List Promo -->
    <section class="testimonial-section">
        <h2 class="fw-bold">Promo & Info</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm border">
                    <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body text-start">
                        <a href="" class="text-decoration-none text-purple"> <p class="card-text fw-bold">Special Offer Fate Strange Fake</p></a>
                        <small class="text-body-secondary">24 Maret - 9 April 2025</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border">
                    <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body text-start">
                        <a href="" class="text-decoration-none text-purple"> <p class="card-text fw-bold">Special Offer Fate Strange Fake</p></a>
                        <small class="text-body-secondary">24 Maret - 9 April 2025</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border">
                    <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body text-start">
                        <a href="" class="text-decoration-none text-purple"> <p class="card-text fw-bold">Special Offer Fate Strange Fake</p></a>
                        <small class="text-body-secondary">24 Maret - 9 April 2025</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm border">
                    <img src="{{ asset('img/Template-Image-Carousel-Custom.png') }}" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body text-start">
                        <a href="" class="text-decoration-none text-purple"> <p class="card-text fw-bold">Special Offer Fate Strange Fake</p></a>
                        <small class="text-body-secondary">24 Maret - 9 April 2025</small>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-4">
            <button type="button" class="btn btn-sm btn-purple">Muat Lebih Banyak</button>
        </div>
    </section>
@endsection

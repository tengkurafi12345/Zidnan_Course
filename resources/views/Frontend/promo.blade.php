@extends('layouts.main')

@section('title', 'Halaman Promo')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/FE/additional-promotion.css') }}">

    @php
        use Carbon\Carbon;
        $now = Carbon::now();
        $bulanIndonesia = [
            1 => 'Januari',2 => 'Februari',3 => 'Maret',4 => 'April',
            5 => 'Mei',6 => 'Juni',7 => 'Juli',8 => 'Agustus',
            9 => 'September',10 => 'Oktober',11 => 'November',12 => 'Desember',
        ];
    @endphp

    <header>
        <h1>Halaman Promo & Info</h1>
    </header>

    <!-- List Promo -->
    <section class="testimonial-section">
        <div class="row gx-3">
            <!-- Sidebar Filter Bulan -->
            <div class="col-md-2 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-purple text-white d-flex justify-content-between align-items-center filter-toggle">
                        <span>Filter Bulan Berakhir</span>
                        <i class="fas fa-angles-down"></i>
                    </div>

                    <div class="list-group list-group-flush filter-content show">
                        @foreach (range(1, 12) as $m)
                            <a href="{{ route('promo.index', ['month' => $m]) }}"
                               class="list-group-item list-group-item-action {{ request('month') == $m ? 'active bg-purple text-white border-0' : '' }}">
                                {{ $bulanIndonesia[$m] }}
                            </a>
                        @endforeach

                        <a href="{{ route('promo.index') }}" class="list-group-item list-group-item-action text-bg-danger">
                            Reset Filter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Daftar Promo -->
            <div class="col-md-10">
                @if($promotions->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <strong>Data Kosong!</strong> Saat ini tidak ada promo yang tersedia.
                    </div>
                @else
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach($promotions as $promo)
                            @php
                                // Dates & quota logic
                                $start = Carbon::parse($promo->start_date);
                                $end = Carbon::parse($promo->end_date);
                                $now = Carbon::now();
                                $remaining = ($promo->quota ?? 0) - ($promo->used_quota ?? 0);

                                if ($start->gt($now)) {
                                    $status = 'akan'; // Akan dimulai
                                } elseif ($remaining > 0 && $end->gte($now) && $start->lte($now)) {
                                    $status = 'aktif';
                                } else {
                                    $status = 'berakhir';
                                }

                                // date formatted in Bahasa Indonesia
                                \Carbon\Carbon::setLocale('id');
                                $startLabel = Carbon::parse($promo->start_date)->translatedFormat('d F Y');
                                $endLabel = Carbon::parse($promo->end_date)->translatedFormat('d F Y');

                                // temporary image
                                $img = asset('img/Template-Image-Carousel-Custom.png');

                                // classes
                                $cardClasses = 'promo-card';
                                if ($status === 'aktif') $cardClasses .= ' active';
                                if ($status === 'berakhir') $cardClasses .= ' inactive';
                            @endphp

                            <div class="col">
                                {{-- If active, allow click; if not active, make non-clickable wrapper --}}
                                @if($status === 'aktif')
                                    <a href="{{ route('promo.show', $promo->id) }}" class="text-decoration-none" aria-label="{{ $promo->name }}">
                                        @else
                                            <div aria-disabled="true" role="article">
                                                @endif

                                                <div class="{{ $cardClasses }}">
                                                    <div class="promo-img-wrap">
                                                        {{-- ribbon (glossy) --}}
                                                        <div class="ribbon {{ $status === 'aktif' ? 'aktif' : ($status === 'berakhir' ? 'berakhir' : 'akan') }}">
                                                            @if($status === 'aktif') PROMO AKTIF
                                                            @elseif($status === 'berakhir') PROMO BERAKHIR
                                                            @else AKAN DIMULAI
                                                            @endif
                                                        </div>

                                                        {{-- small status badge top-right (more readable) --}}
                                                        <div class="status-badge {{ $status === 'aktif' ? 'aktif' : ($status === 'berakhir' ? 'berakhir' : 'akan') }}">
                                                            @if($status === 'aktif') PROMO AKTIF
                                                            @elseif($status === 'berakhir') PROMO BERAKHIR
                                                            @else AKAN DIMULAI
                                                            @endif
                                                        </div>

                                                        {{-- image --}}
                                                        <img src="{{ $img }}" alt="{{ $promo->name }}">
                                                    </div>

                                                    <div class="promo-body">
                                                        <p class="card-title text-purple mb-1">{{ $promo->name }}</p>
                                                        <p class="card-sub mb-2">Berlaku: {{ $startLabel }} - {{ $endLabel }}</p>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <small class="text-muted">Kuota: {{ $promo->quota ?? 0 }} • Terpakai: {{ $promo->used_quota ?? 0 }}</small>

                                                            @if($status === 'aktif')
                                                                <span class="badge rounded-pill" style="background: linear-gradient(90deg,var(--ungu),var(--ungu-2)); color:#fff; font-weight:700;">Gunakan</span>
                                                            @elseif($status === 'akan')
                                                                <span class="badge rounded-pill" style="background: rgba(255,193,7,0.95); color:#111; font-weight:700;">Segera</span>
                                                            @else
                                                                <span class="badge rounded-pill" style="background: rgba(0,0,0,0.06); color:#555; font-weight:700;">Tidak Tersedia</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            @if($status === 'aktif')
                                    </a>
                                @else
                            </div>
                            @endif
                    </div>
                    @endforeach
            </div>

            <!-- pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $promotions->links('vendor.pagination.bootstrap-5') }}
            </div>
            @endif
        </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // safe selectors
            const toggles = document.querySelectorAll('.filter-toggle');
            toggles.forEach(toggle => {
                const icon = toggle.querySelector('.icon');
                const content = toggle.nextElementSibling; // list-group (assumed)
                if (!content) return;
                // ensure content has class .filter-content
                if (!content.classList.contains('filter-content')) return;

                // default open handled by Blade (class show added). Setup click.
                toggle.addEventListener('click', () => {
                    content.classList.toggle('show');
                    if (icon) icon.classList.toggle('bi-chevron-up'), icon.classList.toggle('bi-chevron-down');
                });
            });

            // defensive: ensure filter reset always visible even if collapse height is small
            const resetLink = document.querySelector('.filter-reset');
            if (resetLink) resetLink.style.fontWeight = '700';
        });
    </script>
@endsection

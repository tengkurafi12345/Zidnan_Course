@extends('layouts.app')

@section('title', 'Daftar Promo Dan Info')

@section('content')
    <section class="courses">
        <div class="flex-container">
            <div class="">
                <h1 class="heading">Daftar Promo Dan Info</h1>
            </div>
            <div class="">
                <a href="{{ route('promotion.create') }}" class="btn btn-violet">Tambah Promo</a>
            </div>
        </div>

        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="closebtn">&times;</span>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode Voucher</th>
                        <th>Tanggal</th>
                        <th>Diskon</th>
                        <th>Syarat Dan Ketentuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promotions as $promotion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $promotion->name }}</td>
                            <td>{{ $promotion->code_voucher }}</td>
                            <td>{{ \Carbon\Carbon::parse($promotion->start_date)->format('d/m/Y') }} -  {{ \Carbon\Carbon::parse($promotion->end_date)->format('d/m/Y') }} </td>
                            <td> Rp. {{ number_format($promotion->discount, 0, ',', '.') }}</td>
                            <td>
                                {!! is_array($promotion->term_and_conditions)
                                    ? implode('<br> ', array_map(fn($item) => '- ' . $item, $promotion->term_and_conditions))
                                    : $promotion->term_and_conditions !!}
                            </td>                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('promotion.edit', $promotion->id) }}"
                                        class="btn btn-sm btn-warning" >Edit</a>
                                    <form action="{{ route('promotion.destroy', $promotion->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Packet available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Menambahkan pagination -->
            <div class="d-flex justify-content-center">
                {{ $promotions->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection

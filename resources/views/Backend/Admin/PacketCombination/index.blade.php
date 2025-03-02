@extends('layouts.app')

@section('title', 'Daftar Paket Kombinasi')

@section('css')
    <style>
        /* Mengatur layout umum tabel */
        .table-responsive {
            margin-top: 20px;
            overflow-x: auto;
        }

        /* Styling untuk tabel */
        table.table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        /* Styling untuk header tabel */
        table.table thead {
            background-color: #8e44ad;
            color: #fff;
            text-align: left;
        }

        table.table th {
            padding: 12px 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table.table td {
            padding: 12px 15px;
            border-top: 1px solid #f1f1f1;
        }

        /* Menambahkan efek hover pada baris tabel */
        table.table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Menambahkan border pada tabel */
        table.table,
        table.table th,
        table.table td {
            border: 1px solid #ddd;
        }

        /* Styling untuk tombol di dalam tabel */
        table.table .btn {
            margin: 0 5px;
        }

        /* Styling untuk tombol aksi (Edit, Delete) */
        .table .action-buttons {
            display: flex;
            /* Gunakan flexbox untuk menyusun tombol */
            gap: 10px;
            /* Memberikan jarak antar tombol */
            justify-content: center;
            /* Mengatur tombol agar sejajar di tengah */
        }

        /* Styling tombol di dalam tabel agar lebih kecil dan rapi */
        .table .action-buttons .btn {
            font-size: 12px;
            padding: 6px 12px;
        }

        table.table .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: white;
        }

        table.table .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        table.table .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        table.table .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        /* Styling untuk alert */
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            /* Warna hijau untuk success */
            color: white;
            margin-bottom: 15px;
            border-radius: 5px;
            position: relative;
            /* Agar posisi close button bisa diatur */
        }

        /* Close button (tanda silang) */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
        }

        .closebtn:hover {
            color: #f44336;
            /* Warna merah saat hover */
        }


        /* Styling untuk Badge Is Active */
        .badge-danger {
            background-color: red;
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }

        .badge-success {
            background-color: green;
            color: white;
            padding: 4px 8px;
            text-align: center;
            border-radius: 5px;
        }

        /* Responsif - Tabel di perangkat mobile */
        @media (max-width: 767px) {

            table.table th,
            table.table td {
                padding: 10px;
            }

            table.table .btn {
                font-size: 12px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="courses">
        <div class="flex-container">
            <div class="">
                <h1 class="heading">Daftar Paket Kombinasi</h1>
            </div>
            <div class="">
                <a href="{{ route('packet.combination.create') }}" class="btn btn-violet">Tambah Paket Kombinasi</a>
            </div>
        </div>

        <!-- Flash Notification -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Nama Program</th>
                        <th>Harga</th>
                        <th>Publikasi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($packetCombinations as $packetCombination)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $packetCombination->packet->name  }}</td>
                            <td>{{ $packetCombination->program->name }}</td>
                            <td>{{ "Rp." . number_format($packetCombination->price, 0, ',', '.') }}</td>
                            <td>
                                @if($packetCombination->published_on)
                                    <span class="badge bg-primary">Publish</span>
                                @else
                                    <span class="badge bg-danger">Unpublish</span>
                                @endif
                            </td>
                            <td>
                                @if($packetCombination->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Non Active</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('packet.combination.edit', $packetCombination->id) }}"
                                        class="btn btn-sm btn-warning" ><i class="fas fa-pen-to-square"></i></a>
                                    @if($packetCombination->published_on == false)
                                        <form action="{{ route('packet-combinations.publish', $packetCombination->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to publish this?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success"><i class="fas fa-eye"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('packet-combinations.unpublish', $packetCombination->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to Unpublish this?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary"><i class="fas fa-eye-slash"></i></button>
                                        </form>
                                    @endif
                                    <form action="{{ route('packet.combination.destroy', $packetCombination->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')"><i class="fas fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No packet combination available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

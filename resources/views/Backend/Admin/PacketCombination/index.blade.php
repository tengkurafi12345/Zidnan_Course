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

        <form action="{{ route('packet.combination.index') }}" method="GET">
            <div class="row gx-3">
                <div class="col col-lg-auto ms-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari..." name="search"
                            value="{{ request('search') }}" aria-label="Pencarian" aria-describedby="button-addon1">
                        <button class="btn btn-violet-lite" type="submit" id="button-addon1"><i
                                class="fas fa-magnifying-glass"></i></button>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="dropdown">
                        <button class="btn btn-violet-lite px-3" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-expanded="false" fdprocessedid="ts4wwl">
                            <span class="material-symbols-outlined">Filter</span>
                        </button>
                        <div class="dropdown-menu rounded-3 p-3" style="width: 300px;">
                            <div class="mb-2">
                                <label for="filter-jenjang-les" class="form-label">Nama Jenjang Les</label>
                                <select name="lesson_level_id" class="form-control" id="filter-jenjang-les">
                                    <option value="">Pilih Jenjang Les</option>
                                    @foreach ($lessonLevels as $lessonLevel)
                                        <option value="{{ $lessonLevel->id }}"
                                            {{ request('lesson_level_id') == $lessonLevel->id ? 'selected' : '' }}>
                                            {{ $lessonLevel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="filter-publish" class="form-label">Publikasi</label>
                                <select name="publish" class="form-control" id="filter-publish">
                                    <option value="">Pilih Publikasi</option>
                                    <option value="1" {{ request('publish') === '1' ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ request('publish') === '0' ? 'selected' : '' }}>UnPublish</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="filter-status" class="form-label">Status</label>
                                <select name="filter_status" class="form-control" id="filter-status">
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ request('filter_status') === '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ request('filter_status') === '0' ? 'selected' : '' }}>Non Active</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Filter</button>
                            <a href="{{ route('packet.combination.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </div>
                <div class="col-auto ms-n2">
                    <div class="dropdown">
                        <button class="btn btn-violet-lite px-3" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                            aria-expanded="false">
                            <span class="material-symbols-outlined">Sort</span>
                        </button>
                        <div class="dropdown-menu rounded-3 p-3" style="width: 300px;">
                            <h4 class="fs-lg mb-4">Sort</h4>
                            <div class="row gx-3">
                                <div class="col">
                                    <select name="sort_by" class="form-control" id="sort-by">
                                        <option value="">Pilih Kolom</option>
                                        <option value="lesson_level" {{ request('sort_by') == 'lesson_level' ? 'selected' : '' }}>Nama
                                            Paket
                                        </option>
                                        <option value="program" {{ request('sort_by') == 'program' ? 'selected' : '' }}>
                                            Nama
                                            Program</option>
                                        <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Harga
                                        </option>
                                        <option value="published_on"
                                            {{ request('sort_by') == 'published_on' ? 'selected' : '' }}>
                                            Publikasi</option>
                                        <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>
                                            Status
                                        </option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="sort_order" id="sortAsc" value="asc" autocomplete="off"
                                        {{ request('sort_order') === 'asc' ? 'checked' : '' }}>
                                        <label class="btn btn-light" for="sortAsc" data-bs-toggle="tooltip" data-bs-title="Ascending">
                                            <i class="fas fa-arrow-up-z-a"></i>
                                        </label>

                                        <input type="radio" class="btn-check" name="sort_order" id="sortDesc" value="desc" autocomplete="off"
                                            {{ request('sort_order') === 'desc' ? 'checked' : '' }}>
                                        <label class="btn btn-light" for="sortDesc" data-bs-toggle="tooltip" data-bs-title="Descending">
                                            <i class="fas fa-arrow-down-z-a"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success my-3">Urutkan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


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
                            <td>{{ $packetCombination->lessonLevel->name }}</td>
                            <td>{{ $packetCombination->program->name }}</td>
                            <td>{{ 'Rp.' . number_format($packetCombination->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($packetCombination->published_on)
                                    <span class="badge bg-primary">Publish</span>
                                @else
                                    <span class="badge bg-danger">Unpublish</span>
                                @endif
                            </td>
                            <td>
                                @if ($packetCombination->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Non Active</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('packet.combination.edit', $packetCombination->id) }}"
                                        class="btn btn-sm btn-warning"><i class="fas fa-pen-to-square"></i></a>
                                    @if ($packetCombination->published_on == false)
                                        <form action="{{ route('packet-combinations.publish', $packetCombination->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to publish this?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></button>
                                        </form>
                                    @else
                                        <form
                                            action="{{ route('packet-combinations.unpublish', $packetCombination->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to Unpublish this?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fas fa-eye-slash"></i></button>
                                        </form>
                                    @endif
                                    <form action="{{ route('packet.combination.destroy', $packetCombination->id) }}"
                                        method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fas fa-trash-can"></i></button>
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

        <!-- Menambahkan pagination -->
        <div class="d-flex justify-content-center">
            {{ $packetCombinations->links('vendor.pagination.bootstrap-5') }}
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Pengaturan Jadwal Pertemuan')
@section('css')
    <style>
        /* Styling untuk alert */
        .alert {
            padding: 20px;
            background-color: #c81313;
            /* Warna merah untuk error */
            color: white;
            margin-bottom: 20px;
            /* Memberikan ruang di bawah alert */
            border-radius: 5px;
            position: relative;
            width: 100%;
            /* Agar alert mengisi lebar */
        }

        .alert ul {
            list-style: none;
            padding-left: 0;
        }

        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section class="form-container">
        <h3 class="heading">Pengaturan Jadwal Pertemuan</h3>

        {{-- Menampilkan semua error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="closebtn">&times;</span>
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-white ps-5 mt-3">
                <p><strong>Paket:</strong> {{ $teacherPlacement->packetCombination->lessonLevel->name }}</p>
                <p><strong>Program:</strong> {{ $teacherPlacement->packetCombination->program->name }}</p>
                <p><strong>Siswa:</strong> {{ $teacherPlacement->student->name }}</p>
                <p><strong>Durasi:</strong> {{ $teacherPlacement->duration_minutes }} menit</p>
            </div>

            <div class="card-body">
                <form action="{{ route('meeting.setup.update', $teacherPlacement->id) }}" method="POST" class="mt-3">
                    @csrf
                    @method('PATCH')

                    @foreach ($teacherPlacement->meetings as $key => $meeting)
                        <div class="card p-3 mb-3">
                            <h5>Pertemuan Ke-{{ $key + 1 }}</h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Waktu Mulai</label>
                                    <input type="datetime-local" name="meetings[{{ $key }}][scheduled_start_time]"
                                        class="form-control"
                                        value="{{ optional($meeting->scheduled_start_time)->format('Y-m-d\TH:i') }}">
                                </div>

                                <div class="col-md-6">
                                    <label>Waktu Berakhir (Otomatis)</label>
                                    <input type="text" class="form-control"
                                        value="{{ optional($meeting->scheduled_end_time)->format('d M Y H:i') }}" disabled>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-3">
                        <a href="{{ route('meeting.setup.show', $teacherPlacement->id) }}" class="btn btn-secondary">
                            Batal
                        </a>
                        <button type="submit" name="clear_all" value="true" id="clear-all-btn" class="btn btn-warning">
                            Kosongkan Semua Jadwal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </section>

    <script>
        document.getElementById('clear-all-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Cegah submit form dulu
            
            // Tampilkan popup konfirmasi
            var confirmed = confirm('Apakah Anda yakin ingin mengosongi semua jadwal? Tindakan ini tidak dapat dibatalkan.');
            
            if (confirmed) {
                // Jika konfirmasi, kosongi semua input datetime-local
                document.querySelectorAll('input[name*="scheduled_start_time"]').forEach(input => input.value = '');
                
                // Submit form setelah kosongi input
                document.getElementById('meeting-form').submit();
            }
            // Jika tidak konfirmasi, tidak lakukan apa-apa
        });
    </script>
@endsection

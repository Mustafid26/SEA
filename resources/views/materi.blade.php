@extends('layouts.main')

<style>
    .face-icon {
        transition: all 0.3s ease-in-out;
        opacity: 0.5;
    }

    .selected {
        transform: scale(1.2);
        opacity: 1;
    }

    .rating-option:hover .face-icon {
        transform: scale(1.1);
        opacity: 0.8;
    }
</style>

@section('konten')
    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('sweetalert'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Notifikasi',
                text: '{{ session('sweetalert') }}'
            });
        </script>
    @endif
    <div class="container fadeinUp" style="margin-bottom: 10rem; padding-right: 0px !important; margin-top:10rem;">
        <!-- Card Mobile -->
        <div class="card-mobile">
            <div class="card me-3" style="flex: 1;">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/modulserat.jpg') }}" alt="Logo" class="img-fluid p-5" style="width:30em;">
                </div>
                <div class="card-body">
                    <h3 class="card-title mb-4 text-wrap text-break">Pelatihan {{ $kelas->nama_kelas }} -
                        {{ $kelas->detail_kelas }}</h3>
                    <h5 class="text-left">Deskripsi Singkat</h5>
                    <p class="card-text text-wrap text-break">{!! $kelas->deskripsi !!}</p>
                    @foreach ($kontenByMateri as $materi_id => $items)
                        <div class="list-group mt-4">
                            <div class="drop">
                                @php $firstItem = $items->first(); @endphp
                                <button class="drop-btn btn-primary" onclick="toggledrop({{ $loop->index }})">
                                    <i class="fa fa-solid fa-book"></i> {{ $firstItem->materi->judul_materi }}
                                </button>
                                <!-- Button trigger modal -->
                                <div id="drop-content-{{ $loop->index }}" class="drop-content">
                                    @foreach ($items as $item) 
                                    @if ($sudahPresensi)
                                        <span class="dropdown-item text-white"><i class="fa-solid fa-calendar"></i> Presensi
                                            <i class="fa fa-solid fa-check"></i>
                                        </span>
                                    @else
                                        <a class="dropdown-item text-white" data-bs-toggle="dropdown"><i
                                                class="fa-solid fa-calendar"></i> Presensi
                                        </a>
                                    @endif
                                    <div class="dropdown-menu p-3 border" style="max-width: 30em; width: 100%;">
                                        <form action="{{ url('/add_presensi') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="kelas_id" id="kelas_id"
                                                value="{{ $kelas->id }}">
                                            <div class="form-group mb-3">
                                                <label><strong>Materi: {{ $kelas->nama_kelas }} </strong></label>
                                            </div>
                                        
                                            <div class="form-group mb-3">
                                                <label><strong>Kehadiran: </strong></label><br>
                                                <!-- Opsi Kehadiran -->
                                                <input type="radio" id="hadir" name="kehadiran" value="hadir"
                                                    required>
                                                <label for="hadir">Hadir</label>
                                                <input type="radio" id="izin" name="kehadiran" value="izin"
                                                    class="ms-3" required>
                                                <label for="izin">Izin</label>
                                                <input type="radio" id="tidak_hadir" name="kehadiran" value="tidak_hadir"
                                                    class="ms-3" required>
                                                <label for="tidak_hadir">Tidak Hadir</label>
                                            </div>
                                            <!-- Tombol Simpan -->
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary w-50">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Pengecekan dan tampilan status pretest -->
                                    @if (in_array($materi_id, $pretestCompleted))
                                        <span class="dropdown-item text-white"><strong><i
                                                    class="fa-regular fa-pen-to-square"></i> Pretest <i
                                                    class="fa fa-solid fa-check"></i></strong></span>
                                    @else
                                        <a class="dropdown-item text-white"
                                            href="{{ route('pretest.show', ['kelas_id' => $kelas_id, 'materi_id' => $materi_id]) }}"
                                            onclick="checkQuestions(event)">
                                            <i class="fa-regular fa-pen-to-square"></i> <strong>Pretest</strong>
                                        </a>
                                    @endif
                                    <!-- Daftar materi -->
                                    @if ($pdf->isEmpty())
                                        <span class="dropdown-item text-white">Belum ada materi</span>
                                    @else
                                        @if (in_array($materi_id, $pretestCompleted))
                                            <form action="{{ route('materi.after', ['kelas_id' => $kelas_id, 'materi_id' => $materi_id]) }}"
                                                method="POST" style="margin: 0;">
                                                @csrf
                                                <input type="hidden" name="materi_id" value="{{ $item }}">
                                                <button type="submit" class="dropdown-item text-white text-wrap"><i
                                                        class="fa-solid fa-book-bookmark"></i>
                                                    {{ $item->name }}</button>
                                            </form>
                                            @if ($postestCompleted)
                                                <span style="color:white" class="dropdown-item "><strong><i
                                                            class="fa-regular fa-pen-to-square"></i><strong> Postest
                                                        </strong><i class="fa fa-solid fa-check"></i></span>
                                            @else
                                                <a class="dropdown-item text-white" onclick="checkQuestionsPost(event)"
                                                    href="{{ route('postest.show', $kelas->id) }}"><i
                                                        class="fa-regular fa-pen-to-square"></i>
                                                    <strong>Postest</strong></a>
                                            @endif
                                        @else
                                            <a class="dropdown-item lock text-white text-wrap" href="#"><i
                                                    class="fa-solid fa-book-bookmark"></i> {{ $item->name }} <i
                                                    class="fa fa-solid fa-lock"></i></a>
                                            <a class="dropdown-item lock text-white" href="#"><i
                                                    class="fa-regular fa-pen-to-square"></i> Postest <i
                                                    class="fa fa-solid fa-lock"></i></a>
                                        @endif
                                    @endif
                        
                                    <a class="dropdown-item text-white" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-star"></i> Survey
                                    </a>
                                    <div class="dropdown-menu p-3 border" style="max-width: 30em; width: 100%;">
                                        <form action="{{ url('/add_survey') }}" method="POST" id="surveyForm">
                                            @csrf
                                            <!-- Form Rating -->
                                            <input type="hidden" name="kelas_id" id="kelas_id"
                                                value="{{ $kelas->id }}">
                                            <div class="form-group mb-3 d-flex">
                                                <label><strong>Rating: </strong></label><br>
                                                <!-- Rating dengan gambar ikon wajah dari Font Awesome -->
                                                <div class="justify-content-center" id="ratingIcons">
                                                    <span class="rating-option icon-rating" data-value="Puas">
                                                        <i class="fas fa-smile face-icon text-success"
                                                            style="font-size: 30px;"></i> <!-- Ikon Sangat Puas -->
                                                    </span>
                                                    <span class="rating-option icon-rating" data-value="Cukup Puas">
                                                        <i class="fas fa-meh face-icon text-warning"
                                                            style="font-size: 30px;"></i> <!-- Ikon Puas -->
                                                    </span>
                                                    <span class="rating-option icon-rating" data-value="Kecewa">
                                                        <i class="fas fa-frown face-icon text-danger"
                                                            style="font-size: 30px;"></i> <!-- Ikon Tidak Puas -->
                                                    </span>
                                                </div>
                                                <input type="hidden" name="rating" id="ratingValue" required>
                                            </div>

                                            <!-- Form Saran dan Masukan -->
                                            <div class="form-group mb-3">
                                                <label><strong>Saran dan Masukan: </strong></label>
                                                <textarea name="saran" rows="3" class="form-control" placeholder="Masukkan saran dan masukan..." required></textarea>
                                            </div>

                                            <!-- Tombol Simpan -->
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary w-50">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endforeach
                                </div>
                               
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    {{-- <script>
        let routeSegment = nilaiYangDiterima; // Misal ini adalah variabel yang berisi nilai yang dapat menjadi undefined

        if (typeof routeSegment === 'undefined' || routeSegment === null || routeSegment === '') {
            routeSegment = 'pretest'; // Set nilai default ke 'pretest'
        }

        // Redirect ke URL baru
        window.location.href = `/kelas/{id}/${routeSegment}`;

    </script> --}}
    <script>
        // Saat salah satu ikon dipilih
        document.querySelectorAll('.rating-option2').forEach(function(option2) {
            option2.addEventListener('click', function() {
                // Ambil nilai data-value dari ikon yang dipilih
                var rating = this.getAttribute('data-value');

                // Set nilai tersebut ke input hidden
                document.getElementById('ratingValue2').value = rating;

                // Ganti warna ikon saat dipilih
                document.querySelectorAll('.face-icon').forEach(function(icon) {
                    icon.classList.remove('selected'); // Hilangkan tanda terpilih di semua ikon
                });
                this.querySelector('.face-icon').classList.add(
                    'selected'); // Tambahkan tanda terpilih di ikon yang diklik
            });
        });
    </script>
    <script>
        // Saat salah satu ikon dipilih
        document.querySelectorAll('.rating-option').forEach(function(option) {
            option.addEventListener('click', function() {
                // Ambil nilai data-value dari ikon yang dipilih
                var rating = this.getAttribute('data-value');

                // Set nilai tersebut ke input hidden
                document.getElementById('ratingValue').value = rating;

                // Ganti warna ikon saat dipilih
                document.querySelectorAll('.face-icon').forEach(function(icon) {
                    icon.classList.remove('selected'); // Hilangkan tanda terpilih di semua ikon
                });
                this.querySelector('.face-icon').classList.add(
                    'selected'); // Tambahkan tanda terpilih di ikon yang diklik
            });
        });
    </script>

    {{-- <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').value = today;
    </script> --}}
    <script>
        function toggledrop(index) {
            var content = document.getElementById("drop-content-" + index);
            var button = document.querySelector(`.drop-btn[onclick="toggledrop(${index})"]`);

            if (content.classList.contains("show")) {
                content.classList.remove("show");
                button.classList.remove("active");
            } else {
                content.classList.add("show");
                button.classList.add("active");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            // Menggunakan event handler untuk menangani klik pada link
            $('.lock').click(function(e) {
                e.preventDefault(); // Mencegah perilaku default dari link

                // Menggunakan SweetAlert2 untuk menampilkan pesan
                Swal.fire({
                    icon: 'info',
                    title: 'Notifikasi',
                    text: 'Anda harus menyelesaikan pretest dahulu',
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
    <script>
        function checkQuestions(event) {
            event.preventDefault();

            @if ($questions->isEmpty())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Belum ada pertanyaan yang tersedia untuk pretest ini.'
                });
            @else
                window.location.href = event.target.href;
            @endif
        }
    </script>
    <script>
        function checkQuestionsPost(event) {
            event.preventDefault();

            @if ($questions_postest->isEmpty())
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Belum ada pertanyaan yang tersedia untuk postest ini.'
                });
            @else
                window.location.href = event.target.href;
            @endif
        }
    </script>
@endsection

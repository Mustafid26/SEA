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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('sweetalert'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Notifikasi',
        text: '{{ session('sweetalert') }}'
    });
</script>
@endif
<div class="container fadeinUp" style="margin-bottom: 10rem; padding-right: 0px !important; margin-top:10rem;">
    <div class="d-flex mt-5">
        <!-- Card Mobile -->
        <div class="card-mobile">
            <div class="card card-class me-3" style="flex: 1;">
                <img src="{{ asset('img/logoserat.png') }}" alt="Logo" class="img-fluid p-5">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-wrap text-break">Pelatihan {{$kelas->nama_kelas}} - {{$kelas->detail_kelas}}</h3>
                    <h5 class="text-left">Deskripsi Singkat</h5>
                    <p class="card-text text-wrap text-break">{!! $kelas->deskripsi !!}</p>
                    <div class="list-group mt-4">   
                        <div class="drop"> 
                            <button class="drop-btn btn-primary" onclick="toggledrop()">
                                <i class="fa fa-solid fa-book"></i> Materi Belajar
                            </button>
                            <div id="drop-content" class="drop-content">   
                                <a class="dropdown-item text-white" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-calendar"></i> Presensi</a>  
                                <div class="dropdown-menu w-100 p-3 border">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label><strong>Materi: {{$kelas->nama_kelas}} </strong></label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label><strong>Tanggal: </strong></label>
                                            <input type="date" name="tanggal" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label><strong>Kehadiran: </strong></label><br>
                                            <!-- Opsi Kehadiran -->
                                            <input type="radio" id="hadir" name="kehadiran" value="hadir" required>
                                            <label for="hadir">Hadir</label>
                                            <input type="radio" id="izin" name="kehadiran" value="izin" class="ms-3" required>
                                            <label for="izin">Izin</label>
                                            <input type="radio" id="tidak_hadir" name="kehadiran" value="tidak_hadir" class="ms-3" required>
                                            <label for="tidak_hadir">Tidak Hadir</label>
                                        </div>
                                        <!-- Tombol Simpan -->
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary w-50">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Pengecekan dan tampilan status pretest -->
                                @if ($pretestCompleted)
                                    <span class="dropdown-item text-white"><strong><i class="fa-regular fa-pen-to-square"></i> Pretest <i class="fa fa-solid fa-check"></i></strong></span>
                                @else
                                    <a class="dropdown-item text-white" href="{{ route('pretest.show', $kelas->id) }}" onclick="checkQuestions(event)"><strong>Pretest</strong></a>
                                @endif
                                <!-- Daftar materi -->
                                @if ($materi->isEmpty())
                                    <span class="dropdown-item text-white">Belum ada materi</span>
                                @else
                                @foreach($materi as $m)
                                    @if ($pretestCompleted)
                                        <form action="{{ route('materi.after', ['id' => $m->id, 'kelas_id' => $m->kelas_id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="kelas_id" value="{{ $m->kelas_id }}">
                                            <button type="submit" class="dropdown-item text-white text-wrap"><i class="fa-solid fa-book-bookmark"></i> {{ $m->judul_materi }}</button>
                                        </form>
                                    
                                        @if($postestCompleted)
                                            <span style="color:white"><strong><i class="fa fa-solid fa-check"></i> Postest</strong></span>
                                        @else
                                            <a class="dropdown-item text-white" onclick="checkQuestionsPost(event)" href="{{ route('postest.show', $kelas->id) }}"><i class="fa-regular fa-pen-to-square"></i> <strong>Postest</strong></a>
                                        @endif
                                    @else
                                        <a class="dropdown-item lock text-white text-wrap" href="#"><i class="fa-solid fa-book-bookmark"></i> {{ $m->judul_materi }} <i class="fa fa-solid fa-lock"></i></a>
                                        <a class="dropdown-item lock text-white" href="#"><i class="fa-regular fa-pen-to-square"></i> Postest <i class="fa fa-solid fa-lock"></i></a>
                                    @endif
                                @endforeach
                                @endif
                            </div>                                                  
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Desktop -->
    <div class="mt-5 card-desktop">
        <div class="card card-class me-3" style="flex: 1;">
            <img src="{{ asset('img/logoserat.png') }}" alt="Logo"  class="img-fluid ">
            <div class="card-body">
                <h3 class="card-title">Pelatihan serat kartini  {{$kelas->nama_kelas}} - {{$kelas->detail_kelas}}</h3>
                <h5>Deskripsi Singkat</h5>
                <p class="card-text">{!! $kelas->deskripsi!!}</p>
            </div>
        </div>
        <div class="card card-samping" style="flex: 1;">
            <div class="card-body">
                <h5 class="card-title">Materi</h5>
                
                <div class="card-body d-flex justify-content-center">
                    <div class="dropdown w-100">
                        <!-- Tombol Dropdown -->
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Presensi</strong>
                        </button>
                        
                        <!-- Isi Dropdown -->
                        <div class="dropdown-menu w-100 p-3 border">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label><strong>Materi: {{$kelas->nama_kelas}} </strong></label>
                                </div>
                                <div class="form-group mb-3">
                                    <label><strong>Tanggal: </strong></label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label><strong>Kehadiran: </strong></label><br>
                                    <!-- Opsi Kehadiran -->
                                    <input type="radio" id="hadir" name="kehadiran" value="hadir" required>
                                    <label for="hadir">Hadir</label>
                                    <input type="radio" id="izin" name="kehadiran" value="izin" class="ms-3" required>
                                    <label for="izin">Izin</label>
                                    <input type="radio" id="tidak_hadir" name="kehadiran" value="tidak_hadir" class="ms-3" required>
                                    <label for="tidak_hadir">Tidak Hadir</label>
                                </div>
                                <!-- Tombol Simpan -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary w-50">Simpan</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card-body d-flex justify-content-center">
                    <div class="dropdown w-100">
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-solid fa-book"></i> Klik Disini
                        </button>
                        <ul class="dropdown-menu w-100">
                            @if ($pretestCompleted)
                                    <span style="margin-left: 15px;"><strong><i class="fa fa-solid fa-check"></i> Pretest</strong></span>
                            @else
                                    <a class="dropdown-item" href="{{ route('pretest.show', $kelas->id) }}" onclick="checkQuestions(event)"><strong>Pretest</strong></a>
                            @endif
                            <!-- Daftar materi -->
                            @if ($materi->isEmpty())
                                <span class="dropdown-item">Belum ada materi</span>
                            @else
                            @foreach($materi as $m)
                                @if ($pretestCompleted)
                                    <form action="{{ route('materi.after', ['id' => $m->id, 'kelas_id' => $m->kelas_id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="kelas_id" value="{{ $m->kelas_id }}">
                                        <button type="submit" class="dropdown-item text-wrap">{{ $m->judul_materi }}</button>
                                    </form>
                                
                                    @if($postestCompleted)
                                        <span style="margin-left: 15px;"><strong><i class="fa fa-solid fa-check"></i> Postest</strong></span>
                                    @else
                                        <a class="dropdown-item" onclick="checkQuestionsPost(event)" href="{{ route('postest.show', $kelas->id) }}"><strong>Postest</strong></a>
                                    @endif
                                @else
                                    <a class="dropdown-item lock text-wrap"><i class="fa fa-solid fa-lock"></i> {{ $m->judul_materi }}</a>
                                    <a class="dropdown-item lock" href="#"><i class="fa fa-solid fa-lock"></i> Postest</a>
                                @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>              
                </div>

                <div class="card-body d-flex justify-content-center">
                    <div class="dropdown w-100">
                        <!-- Tombol Dropdown -->
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Survey</strong>
                        </button>
                        
                        <!-- Isi Dropdown -->
                        <div class="dropdown-menu w-100 p-3 border">
                            <form action="" method="POST" id="surveyForm">
                                @csrf
                                
                                <!-- Form Rating -->
                                <div class="form-group mb-3">
                                    <label><strong>Rating: </strong></label><br>
                                    <!-- Rating dengan gambar ikon wajah dari Font Awesome -->
                                    <div class="d-flex justify-content-between w-75" id="ratingIcons">
                                        <span class="rating-option" data-value="1">
                                            <i class="fas fa-smile face-icon text-success" style="font-size: 30px;"></i> <!-- Ikon Sangat Puas -->
                                        </span>
                                        <span class="rating-option" data-value="2">
                                            <i class="fas fa-meh face-icon text-warning" style="font-size: 30px;"></i> <!-- Ikon Puas -->
                                        </span>
                                        <span class="rating-option" data-value="3">
                                            <i class="fas fa-frown face-icon text-danger" style="font-size: 30px;"></i> <!-- Ikon Tidak Puas -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggledrop() {
        var content = document.getElementById("drop-content");
        var button = document.querySelector(".drop-btn");
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

<script>
    // Menyimpan nilai rating ketika ikon ditekan
    document.querySelectorAll('.rating-option').forEach(item => {
        item.addEventListener('click', function() {
            // Mengambil value dari data-value atribut
            const ratingValue = this.getAttribute('data-value');
            
            // Mengatur value input tersembunyi
            document.getElementById('ratingValue').value = ratingValue;
            
            // Menghapus kelas 'selected' dari semua ikon
            document.querySelectorAll('.face-icon').forEach(icon => {
                icon.classList.remove('selected');
            });
            
            // Menambahkan kelas 'selected' ke ikon yang diklik
            this.querySelector('i').classList.add('selected');
        });
    });
</script>

@endsection

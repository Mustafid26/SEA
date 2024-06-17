@extends('layouts.main')

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
<div class="container">
    <div class="d-flex mt-5">
        <!-- Card Mobile -->
        <div class="card-mobile"    >
            <div class="card card-class me-3" style="flex: 1;">
                <img src="{{asset("/img/kelas.png")}}" class="card-img-top img-class">
                <div class="card-body">
                    <h3 class="card-title">Pelatihan {{$kelas->nama_kelas}} - {{$kelas->detail_kelas}}</h3>
                    <h5>Deskripsi Singkat</h5>
                    <p class="card-text">{{$kelas->deskripsi}}</p>
                    <div class="list-group">   
                        <div class="drop">
                            <button class="drop-btn btn-primary" onclick="toggledrop()">
                                Materi
                            </button>
                            <div id="drop-content" class="drop-content">
                                <!-- Pengecekan dan tampilan status pretest -->
                                @if ($pretestCompleted)
                                    <span style="color:white"><strong><i class="fa fa-solid fa-check"></i> Pretest</strong></span>
                                @else
                                    <a class="dropdown-item text-white" href="{{ route('pretest.show', $kelas->id) }}"><strong>Pretest</strong></a>
                                @endif
                            
                                <!-- Daftar materi -->
                                @foreach($materi as $m)
                                    @if ($pretestCompleted)
                                    <form action="{{ route('materi.after', ['id' => $m->id, 'kelas_id' => $m->kelas_id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="kelas_id" value="{{ $m->kelas_id }}">
                                        <button type="submit" class="dropdown-item text-white">{{ $m->judul_materi }}</button>
                                    </form>
                                    @else
                                        <a class="dropdown-item lock text-white" href="#"><i class="fa fa-solid fa-lock"></i> {{ $m->judul_materi }}</a>
                                    @endif
                                @endforeach
                            </div>
                                                                                                      
                        </div>     
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Desktop -->
    </div>
    <div class="mt-5 card-desktop">
        <div class="card card-class me-3" style="flex: 1;">
            <img src="{{asset("/img/kelas.png")}}" class="card-img-top img-class">
            <div class="card-body">
                <h3 class="card-title">Pelatihan {{$kelas->nama_kelas}} - {{$kelas->detail_kelas}}</h3>
                <h5>Deskripsi Singkat</h5>
                <p class="card-text">{{$kelas->deskripsi}}</p>
            </div>
        </div>
        <div class="card card-samping" style="flex: 1;">
            <div class="card-body">
                <h5 class="card-title">Materi</h5>
                <div class="card-body d-flex justify-content-center">
                    <div class="dropdown w-100">
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Materi
                        </button>
                        <ul class="dropdown-menu w-100">
                            @if ($pretestCompleted)
                                    <span style="margin-left: 15px;"><strong><i class="fa fa-solid fa-check"></i> Pretest</strong></span>
                            @else
                                    <a class="dropdown-item" href="{{ route('pretest.show', $kelas->id) }}"><strong>Pretest</strong></a>
                            @endif
                            
                                <!-- Daftar materi -->
                            @foreach($materi as $m)
                                @if ($pretestCompleted)
                                <form action="{{ route('materi.after', ['id' => $m->id, 'kelas_id' => $m->kelas_id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="kelas_id" value="{{ $m->kelas_id }}">
                                    <button type="submit" class="dropdown-item text-white">{{ $m->judul_materi }}</button>
                                </form>
                                @endif
                            @endforeach
                        </ul>
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
@endsection

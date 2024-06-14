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
                                        <a class="dropdown-item text-white" href="{{ route('materi.after', ['id' => $m->id]) }}">{{ $m->judul_materi }}</a>
                                    @else
                                        @if ($m->pretestTakenByUser(auth()->id()))
                                            <a class="dropdown-item text-white" href="{{ route('materi.after', ['id' => $m->id]) }}">{{ $m->judul_materi }}</a>
                                        @else
                                            <a class="dropdown-item text-white" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i>{{ $m->judul_materi }}</a>
                                        @endif
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
                @foreach($materi as $m)
                    <div class="dropdown w-100">
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$m->judul_materi}}
                        </button>
                        <ul class="dropdown-menu w-100">
                            @if ($m->pretestTakenByUser(auth()->id()))
                                <li><a class="dropdown-item text-muted" href="#"><strong><i class="fa fa-solid fa-check"></i> Pretest</strong></a></li>
                                <li><a class="dropdown-item" href="#">Konten 1</a></li>
                                <li><a class="dropdown-item" href="#">Konten 2</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('pretest.show', $m->id) }}"><strong>Pretest</strong></a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i> Konten 1</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i> Konten  2</a></li>
                            @endif
                        </ul>
                    </div>              
                @endforeach
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
@endsection

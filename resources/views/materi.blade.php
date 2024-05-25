@extends('layouts.main')

@section('konten')
<div class="container">
    <div class="card mt-5">
        <img src="path-to-image.jpg" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">Pelatihan {{$kelas->nama_kelas}} - {{$kelas->detail_kelas}}</h5>
            <p class="card-text"><small class="text-muted">24 Siswa</small></p>
            <p class="card-text">Pelatihan Bu Peri adalah sebuah pelatihan bagi perempuan tentang berbagai cara dalam perlindungan diri.</p>
            <div class="list-group">
                @foreach($materi as $m)
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <i class="fa fa-lock"></i> {{$m->judul_materi}}
                    <i class="fa-solid fa-caret-down"></i>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
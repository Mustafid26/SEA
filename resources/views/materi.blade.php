@extends('layouts.main')

@section('konten')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-info">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="d-flex mt-5">
        <!-- Card Mobile -->
        <div class="card-mobile">
            <div class="card card-class me-3" style="flex: 1;">
                <img src="{{asset("/img/kelas.png")}}" class="card-img-top img-class">
                <div class="card-body">
                    <h3 class="card-title">Pelatihan {{$kelas->nama_kelas}} - {{$kelas->detail_kelas}}</h3>
                    <h5>Deskripsi Singkat</h5>
                    <p class="card-text">{{$kelas->deskripsi}}</p>
                    <div class="list-group">
                        @foreach($materi as $m)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{$m->judul_materi}}
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('pretest.show', $m->id) }}">Pretest</a></li>
                                @if ($m->pretestTakenByUser(auth()->id()))
                                    <li><a class="dropdown-item" href="#">Konten 1</a></li>
                                    <li><a class="dropdown-item" href="#">Konten 2</a></li>
                                @else
                                <li><a class="dropdown-item" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i> Konten 1</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i> Konten 2</a></li>
                                @endif
                            </ul>
                        </div>              
                        @endforeach
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
                            <li><a class="dropdown-item" href="{{ route('pretest.show', $m->id) }}"><strong>Pretest</strong></a></li>
                            @if ($m->pretestTakenByUser(auth()->id()))
                                <li><a class="dropdown-item" href="#">Konten 1</a></li>
                                <li><a class="dropdown-item" href="#">Konten 2</a></li>
                            @else
                            <li><a class="dropdown-item" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i> Konten 1</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-lock" style="margin-right: 5px;"></i> Konten 2</a></li>
                            @endif
                        </ul>
                    </div>              
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

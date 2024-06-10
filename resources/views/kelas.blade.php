@extends('layouts.main')

@section('konten')
<div class="container mt-5" style="margin-bottom: 5rem;"> 
    <div class="header">
      <div class="profile">
        @if (Auth::user()->profile_photo_path)
          <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" style="width: 50px;" alt="Profile Picture">
        @else
          <img src="{{ asset('img/Profile.png')}}" style="width: 50px;" alt="Profile Picture" />
        @endif
        <div>
          <h5>Halo, Anne</h5>
          <p>1000 Poin</p>
        </div>
      </div>
    </div>
  
    <h5>Pilih Pelatihan</h5>
    @foreach($kelas as $k)
    <a href="{{ url('/kelas/' . $k->id . '/materi') }}">
        <div class="card-custom shadow-lg">
          <img src="img/{{$k->image}}">
          <div>
              <h6>{{$k->nama_kelas}}</h6>
              <p>{{$k->detail_kelas}}</p>
          </div>
          <div class="progress-circle">
              <span>93%</span>
              <small>Progres Anda</small>
          </div>
        </div>
    </a>
    @endforeach
</div>
@endsection
@extends('layouts.main')

@section('kelas')
<div class="container mt-5">
    <div class="header">
      <div class="profile">
        <img src="https://via.placeholder.com/50" alt="Profile Picture">
        <div>
          <h5>Halo, Anne</h5>
          <p>1000 Poin</p>
        </div>
      </div>
    </div>
  
    <h5>Pilih Pelatihan</h5>
    @foreach($kelas as $k)
    <a href="http://">
        <div class="card-custom shadow-lg">
        <img src="img/{{$k->image}}" alt="Bu Peri">
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
@extends('layouts.main')

@section('konten')
@if(session('sweetalert'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Notifikasi',
        text: '{{ session('sweetalert') }}'
    });
</script>
@endif
<div class="container mt-5 fadeinUp" style="margin-bottom: 10rem;"> 
    <div class="header">
      <div class="profile">
        @if (Auth::user()->profile_photo_path)
          <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" style="width: 80px; height:80px;" alt="Profile Picture">
        @else
          <img src="{{ asset('img/Profile.png')}}" style="width: 80px;" alt="Profile Picture" />
        @endif
        <div>
          <h5>Halo, {{Auth::user()->nama_lengkap}}</h5>
          @if (Auth::user()->usertype != 0)
          <span><img src="{{ asset('img/coin.png')}} " alt="" srcset="">{{ Auth::user()->points }} Poin</span>
          @endif
        </div>
      </div>
    </div>
  
    <h5>Pilih Pelatihan</h5>
    @php
      $userRombel = auth()->user()->rombel;
    @endphp

    @foreach($kelas->where('rombel', $userRombel) as $k)
        <a href="{{ url('/kelas/' . $k->id . '/materi') }}">
            <div class="card-custom shadow-lg">
                <img src="{{ asset('storage/' . $k->image) }}" class="logo_kelas">
                <div>
                    <h6>{{ $k->nama_kelas }}</h6>
                    <p>{{ $k->detail_kelas }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
<div class="container d-flex justify-content-end">
  {{ $kelas->links() }}
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
  let observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("fadeinUp");
        observer.unobserve(entry.target); // Remove observer after animation
      }
    });
  });

  let fadeInElements = document.querySelectorAll('.container');
  fadeInElements.forEach(element => {
    observer.observe(element);
  });
});

</script>
@endsection
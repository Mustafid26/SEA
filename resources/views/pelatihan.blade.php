@extends('layouts.main')

@section('konten')
<div class="container">
  <div class="mt-4 fadeinUp">
      <h1>Pelatihan</h1>
      <p>{{$jumlahpelatihan}} pelatihan</p>
  
      @foreach($pelatihan->sortByDesc('created_at') as $a)
      <div class="card article-card shadow-sm" style="border-radius: 20px;">
          <div class="d-flex justify-content-center">
              <img src="{{ asset('storage/' . $a->image) }}" loading="lazy"/>
          </div>
          <div class="card-body">
              <h2 class="article-card-title">
              {{$a->title}}
              </h2>
              <p class="article-card-date">{{$a->created_at->diffForHumans()}}</p>
              <a href="{{ route('pelatihan.show', $a->slug) }}" class="btn btn-custom">Lihat pelatihan</a>
          </div>
      </div>
      @endforeach
      <div class="container d-flex justify-content-end">
          {{ $pelatihan->links() }}
      </div>
  </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    let observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("fadeinUp");
          observer.unobserve(entry.target);
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
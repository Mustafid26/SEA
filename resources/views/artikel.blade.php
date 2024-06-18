@extends('layouts.main')

@section('konten')
<div class="mt-4 fadeinUp">
    <h1>Artikel</h1>
    <p>{{$jumlahartikel}} Artikel</p>

    @foreach($artikel->sortByDesc('created_at') as $a)
    <div class="card article-card shadow-sm" style="border-radius: 20px;">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/' . $a->image) }}" loading="lazy"/>
        </div>
        <div class="card-body">
            <h2 class="article-card-title">
            {{$a->title}}
            </h2>
            <p class="article-card-date">{{$a->created_at->diffForHumans()}}</p>
            <a href="{{ route('artikel.show', $a->slug) }}" class="btn btn-custom">Lihat Artikel</a>
        </div>
    </div>
    @endforeach
    <div class="container d-flex justify-content-end">
        {{ $artikel->links() }}
    </div>
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
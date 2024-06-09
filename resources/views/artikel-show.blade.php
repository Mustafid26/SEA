@extends('layouts.main')

@section('konten')
<div class="container mt-5 article-content" style="margin-bottom: 5rem;">
    <h2 class="article-title">{{$artikel->title}}</h2>
    <p class="article-meta">Dibuat Oleh {{$artikel->author->name}}<br>{{$artikel->created_at->diffForHumans()}}</p>
    
    <div class="article-image">
        <img src="{{ asset('storage/' . $artikel->image) }}" alt="Artikel Image">
    </div>

    <article class="my-5">
        {!! $artikel->body !!}
    </article>
</div>

<button class="fab" onclick="scrollToTop()">
    <i class="bi bi-arrow-up"></i>
</button>

<script>
    function scrollToTop() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
</script>
@endsection
@extends('layouts.main')

@section('konten')
<div class="containermt-5 article-content" style="margin-bottom: 5rem;">
    <h2 class="article-title">{{$artikel->title}}</h2>
    <p class="article-meta">{{$artikel->author->name}}<br>{{$artikel->created_at->diffForHumans()}}</p>
    
    <div class="article-image d-flex justify-content-center">
        <img src="{{ asset('img/dummy.png')}}" alt="Artikel Image" class="img-fluid">
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
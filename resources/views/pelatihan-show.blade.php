@extends('layouts.main')

@section('konten')
<div class="container mt-5 article-content" style="margin-bottom: 10rem;">
    <h2 class="article-title">{{$pelatihan->title}}</h2>
    <p class="article-meta">Dibuat Oleh {{$pelatihan->author->name}}<br>{{$pelatihan->created_at->diffForHumans()}}</p>
    
    <div class="article-image">
        <img src="{{ asset('storage/' . $pelatihan->image) }}" alt="Artikel Image" style="max-width: 100%" >
    </div>

    <article class="my-5">
        {!! $pelatihan->body !!}
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
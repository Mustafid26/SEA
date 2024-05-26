@extends('layouts.main')

@section('konten')
<div class="mt-4">
    <h1>Artikel</h1>
    <p>20 artikel</p>

    @foreach($artikel as $a)
    <div class="card article-card shadow-sm" style="border-radius: 20px;">
        <div class="d-flex justify-content-center">
            <img src="img/Bu Ipah.png" />
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
@endsection
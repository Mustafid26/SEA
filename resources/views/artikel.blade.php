@extends('layouts.main')

@section('konten')
<div class="title mt-4">
    <h1>Artikel</h1>
    <p>{{$jumlahartikel}} Artikel</p>
</div>
<div class="desktop-artikel container">
    <div class="row">
        @foreach($artikel as $a)
        <div class="col-12 col-lg-4 mb-3">
            <div class="card my-2 h-100">
                <div class="d-flex">
                    <img src="{{ asset('img/dummy.png')}}" class="img-fluid"/>
                </div>
                <div class="card-body">
                    <span><small class="text-muted ms-2 me-2">{{$a->created_at->diffForHumans()}}</small></span>
                    <h2>{{$a->title}}</h2>
                </div>
                <div class="d-flex align-items-center justify-content-end mb-2">
                    <div class="wrapper">
                        <a href="{{ route('artikel.show', $a->slug) }}"><span>Lihat Artikel</span></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="mobile-artikel p-2 mt-4">
    @foreach($artikel as $a)
    <div class="card article-card shadow-sm" style="border-radius: 20px;">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/dummy.png')}}" />
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
</div>
<div class="container d-flex justify-content-end">
    {{ $artikel->links() }}
</div>
@endsection
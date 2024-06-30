@extends('layouts.main')

@section('konten')
    <div class="container-parent vh-100" style="margin-bottom: 10rem;">
        <div class="container-child">
            <div class="video-container">
                <img src="{{asset('img/SEA.png')}}" alt="" class="img-fluid p-2">
            </div>
            <div class="content-materi-after">
                <h2>{{ $materi->judul_materi }}</h2>
                @if($konten && $konten->desc)
                    {!! $konten->desc !!}
                @else
                    <p>Belum ada konten</p>
                @endif
                @if (isset($konten) && $konten->konten)
                    <a href="{{ url('/download/' . $konten->id) }}" class="button">Download Materi</a>
                @endif
            </div>
        </div>
    </div>
@endsection

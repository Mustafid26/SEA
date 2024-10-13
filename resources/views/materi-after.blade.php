@extends('layouts.main')

@section('konten')
    <div class="container-parent fadeinUp vh" style="margin-bottom: 10rem;">
        <div class="container-child">
            <div class="video-container">
                <img src="{{ asset('img/logoserat.png') }}" alt="" class="img-fluid" style="height: auto; display: block; margin: 0 auto;">
            </div>
            <div class="content-materi-after">
                <h2>{{ $materi->judul_materi }}</h2>
                @if($konten && $konten->desc)
                    {!! $konten->desc !!}
                @else
                    <p>Belum ada konten</p>
                @endif
                <section class="mt-5"> 
                    @if ($konten && $konten->konten)
                        <a href="{{ url('/download/' . $konten->id) }}" class="button" target="_blank">Download Materi</a>
                        @if (in_array(strtolower(pathinfo($konten->konten, PATHINFO_EXTENSION)), ['pdf', 'ppt', 'pptx']))
                        <a href="{{ url('/view', $konten->id) }}" class="button" target="_blank">Lihat Materi</a>
                        @endif
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection

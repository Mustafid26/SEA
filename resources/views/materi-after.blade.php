@extends('layouts.main')

@section('konten')
    <div class="container-parent vh-100">
        <div class="container-child">
            <a href="#" class="back-button">←</a>
            <div class="video-container">
                <!-- Play button is styled using CSS pseudo-element -->
            </div>
            <div class="content-materi-after">
                <h2>{{ $materi->judul_materi }}</h2>
                <p>Peserta mampu :</p>
                <p>
                    1. Memahami pentingnya tindakan pencegahan terhadap potensi kejahatan
                    kriminal.
                </p>
                <p>
                    2. Memanfaatkan teknologi untuk mengidentifikasi potensi bahaya di
                    lingkungan termasuk kejahatan siber (cyber crime) sebagai upaya
                    perlindungan diri dan mengurangi resiko menjadi korban kejahatan.
                </p>
                @if (isset($konten) && $konten->konten)
                    <a href="{{ url('/download/' . $konten->id) }}" class="button">Download Materi</a>
                @endif
            </div>
        </div>
    </div>
@endsection

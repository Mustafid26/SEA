@extends('layouts.main')

@section('konten')
    <div class="hero-section text-center text-white d-flex align-items-center justify-content-center">
        <div class="content">
            <img src="{{asset('img/logoserat.png')}}" alt="" class="img-fluid w-50 mb-3" />
            <h1 class="text-white">
                Mulai Perjalanan <br />
                <span>#PerempuanMandiri</span> <br />
                Bersama Serat Kartini
            </h1>
            <p style="color: black; font-weight:bold;">
                "Tiada cuaca di langit yang tetap selamanya. Tiada mungkin akan terus terus menerus terang cuaca. Sehabis
                malam gelap gulita , lahir pagi membawa kehidupan. " <br> -RA. Kartini
            </p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/lp.png') }}" alt="Hero Image" class="img-fluid" />
        </div>
    </div>

    <div class="container-sea text-center mt-5 fadeinUp">
        <div class="content-wrapper">
            <img src="{{ asset('img/logoserat1.webp') }}" alt="SEA Logo" class="logo-home mb-5" />
            <div class="text-content">
                <h3 class="title">Apa Itu Serat Kartini?</h3>
                <p class="intro">Hai!</p>
                <p>
                    SERAT KARTINI adalah sebuah platform aplikasi berbasis website pendukung
                    SEKARI, yang digunakan untuk mengunduh materi, mengerjakan pretest
                    dan postest. Serta bisa mendapatkan sekari points untuk ditukarkan
                    berbagai hadiah khusus siswa SEKARI.
                </p>
                <div class="button-group">
                    <a href="/kelas" class="btn btn-primary">Yukk Cobain Sekarang!</a>
                </div>
            </div>
        </div>
    </div>
    <div id="slider" class="pt-5 mt-5" style="background-color: #FEE5FD">
        <div class="container">
            <h1 class="text-center"><b>Dokumentasi</b></h1>
            <div class="slider">
                <div class="owl-carousel">
                    @foreach ($photos as $p)
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img style="max-height: 350px;" src="{{ asset('storage/' . $p->image) }}" loading="lazy" />
                            </div>
                            <h5 class="mb-0 text-center text-white">{{ $p->title }}</b></h5>
                            <p class="text-center p-4">{{ $p->desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="mitra">
        <div class="container">
            <h1 class="mb-4 text-center">Mitra</h1>
            <p class="mb-5 text-center">Mitra Yang Turut Serta Dalam Pelaksanaan Serat Kartini</p>
            <div class="row justify-content-center mitra-img">
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <img src="{{ asset('img/logomitra1.png') }}" alt="mitra1" class="img-fluid partner-logo">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                dots: false,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                center: true,
                navText: [
                    "<i class='fa fa-angle-left text-white'></i>",
                    "<i class='fa fa-angle-right text-white'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>
@endsection

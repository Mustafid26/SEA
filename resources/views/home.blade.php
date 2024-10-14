@extends('layouts.main')

@section('konten')
    @guest
        @include('popup')
    @endguest
    <div class="hero-section text-center text-white d-flex align-items-center justify-content-center">
        <div class="content">
            <img src="{{ asset('img/herologo.png') }}" alt="" class="img-fluid mb-3 img-h" />
            <h1 class="text-white text-hero">
                Mulai Perjalanan <br />
                <span>#PerempuanPembelajar</span> <br />
                Bersama Serat Kartini Menjadi Perempuan Cerdas dan Mandiri
            </h1>
            <p style="font-weight:bold;" class="text-hero2">
                "Tiada cuaca di langit yang tetap selamanya. Tiada mungkin akan terus terus menerus terang cuaca. Sehabis
                malam gelap gulita , lahir pagi membawa kehidupan. " <br> -RA. Kartini
            </p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/herologo5.png') }}" alt="Hero Image" class="img-fluid hero-img" style="width: 75%;" />
        </div>
    </div>

    <div class="container-sea text-center mt-5">
        <div class="content-wrapper">
            <img src="{{ asset('img/logoserat1.webp') }}" alt="SEA Logo" class="logo-home mb-5" data-aos="fade-right" />
            <div class="text-content">
                <h3 class="title" data-aos="fade-left">Apa Itu Serat Kartini?</h3>
                <p class="intro" data-aos="fade-left">Hai!</p>
                <p data-aos="fade-left">
                    Sekolah Perempuan Cerdas Masa Kini (SERAT KARTINI) merupakan model pemberdayaan perempuan akar rumput
                    yang bertujuan mengembangkan kapasitas perempuan melalui peningkatan kesadaran dan pemikiran kritis,
                    kecakapan hidup, solidaritas dan pembelajaran sepanjang hayat, yang telah dilaunching secara resmi oleh
                    Gubernur Jawa Tengah pada bulan November tahun 2020
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
                    <img src="{{ asset('img/logomitra1.png') }}" alt="mitra1" class="img-fluid partner-logo"
                        data-aos="fade-up">
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

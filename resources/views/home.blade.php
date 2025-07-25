@extends('layouts.main')
<link rel="preload" as="image" href="{{ asset('img/herologo.webp') }}" type="image/webp">
<link rel="preload" as="image" href="{{ asset('img/logoserat_11zon.webp') }}" type="image/webp">
<link rel="preload" as="image" href="{{ asset('img/logomitra1.webp') }}" type="image/webp">
@section('konten')
    <style>
        /* 1. Container Utama Slider */
        .native-slider-container {
            display: flex;
            /* Membuat item berjajar horizontal */
            overflow-x: auto;
            /* Memungkinkan scroll horizontal */
            gap: 1.5rem;
            /* Jarak antar kartu */
            padding: 1rem 0.5rem;
            /* Sedikit padding atas-bawah */

            /* Efek 'snap' saat scrolling, seperti carousel */
            scroll-snap-type: x mandatory;

            /* Style untuk scrollbar agar lebih minimalis */
            scrollbar-width: thin;
            scrollbar-color: #d73696 #FEE5FD;
        }

        /* Style scrollbar untuk browser Webkit (Chrome, Safari) */
        .native-slider-container::-webkit-scrollbar {
            height: 8px;
        }

        .native-slider-container::-webkit-scrollbar-track {
            background-color: #FEE5FD;
            border-radius: 4px;
        }

        .native-slider-container::-webkit-scrollbar-thumb {
            background-color: #d73696;
            border-radius: 4px;
        }

        /* 2. Kartu Individual di dalam Slider */
        .docs-card {
            /* Mencegah kartu 'penyok' atau meregang */
            flex: 0 0 auto;
            width: 80%;
            /* Lebar kartu pada layar mobile */
            scroll-snap-align: start;
            /* Titik 'snap' ada di awal kartu */
            background-color: #a72a7b;
            /* Warna latar kartu */
            border-radius: 12px;
            overflow: hidden;
            /* Memastikan sudut gambar juga melengkung */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .docs-card-img-container {
            width: 100%;
            height: 250px;
            /* Tinggi gambar dibuat konsisten */
            background-color: #c4c4c4;
            /* Warna placeholder jika gambar gagal dimuat */
        }

        .docs-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar memenuhi area tanpa distorsi */
        }

        .docs-card-content {
            padding: 1rem 1.5rem;
            color: white;
        }

        .docs-card-content h5 {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        /* 3. Responsif untuk layar lebih besar (desktop) */
        @media (min-width: 768px) {
            .docs-card {
                width: 40%;
                /* Menampilkan sekitar 2.5 kartu */
            }
        }

        @media (min-width: 1024px) {
            .docs-card {
                width: 30%;
                /* Menampilkan sekitar 3 kartu */
            }
        }
    </style>
    @guest
        @include('popup')
    @endguest
    <div class="hero-section text-center text-white d-flex align-items-center justify-content-center">
        <div class="content">
            <img src="{{ asset('img/herologo.webp') }}" alt="" class="img-fluid mb-3 img-h" loading="lazy" />
            <h1 class="text-white text-hero text-wrap">
                Mulai Perjalanan <br />
                <span class="text-wrap">#PerempuanPembelajar</span> <br />
                Bersama Serat Kartini Menjadi Perempuan Cerdas dan Mandiri
            </h1>
            <p style="font-weight:bold;" class="text-hero2 text-wrap">
                "Tiada cuaca di langit yang tetap selamanya. Tiada mungkin akan terus terus menerus terang cuaca. Sehabis
                malam gelap gulita , lahir pagi membawa kehidupan. " <br> -RA. Kartini
            </p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/herologo5.webp') }}" alt="Hero Image" class="img-fluid hero-img" style="width: 75%;" />
        </div>
    </div>

    <div class="container-sea text-center mt-5">
        <div class="content-wrapper">
            <img src="{{ asset('img/logoserat_11zon.webp') }}" alt="SEA Logo" class="logo-home mb-5" data-aos="fade-right"
                loading="lazy" />
            <div class="text-content">
                <h3 class="title" data-aos="fade-left">Apa Itu Serat Kartini?</h3>
                <p class="intro" data-aos="fade-left">Hai Kartinian!</p>
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
    <div id="slider-docs" class="py-5 mt-5" style="background-color: #FEE5FD">
        <div class="container">
            <h1 class="text-center"><b>Dokumentasi</b></h1>

            {{-- Ganti div slider & owl-carousel dengan container baru --}}
            <div class="native-slider-container">
                @forelse ($photos as $p)
                    {{-- Gunakan struktur kartu baru --}}
                    <div class="docs-card">
                        <div class="docs-card-img-container">
                            <img src="{{ asset('storage/' . $p->image) }}" loading="lazy" alt="{{ $p->title }}" />
                        </div>
                        <div class="docs-card-content">
                            <h5 class="text-center text-white">{{ $p->title }}</h5>
                        </div>
                    </div>
                @empty
                    {{-- Tampilkan pesan jika tidak ada foto --}}
                    <p class="text-center w-100">Belum ada dokumentasi untuk ditampilkan.</p>
                @endforelse
            </div>

        </div>
    </div>
    <div class="mitra">
        <div class="container">
            <h1 class="mb-4 text-center">Mitra</h1>
            <p class="mb-5 text-center">Mitra Yang Turut Serta Dalam Pelaksanaan Serat Kartini</p>
            <div class="row justify-content-center mitra-img">
                <div class="col-6 col-md-2 d-flex justify-content-center">
                    <img src="{{ asset('img/logomitra1.webp') }}" alt="mitra1" class="img-fluid partner-logo"
                        data-aos="fade-up" loading="lazy">
                </div>
            </div>
            {{-- <div class="row justify-content-center">
                <div class="card shadow-lg border-0 rounded-4 m-2" style="width: 20rem;">
                    <!-- Product Image -->
                    <div class="text-center mt-4">
                        <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/airpods-max-green-select-202011?wid=470&hei=556&fmt=png-alpha&.v=1604022365000" 
                            class="card-img-top w-75" alt="AirPods Max">
                    </div>
            
                    <!-- Card Body -->
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">AirPods Max</h5>
                        <p class="card-text text-muted">
                            A perfect balance of exhilarating high-fidelity audio and the effortless magic of AirPods.
                        </p>
            
                        <!-- Dropdowns -->
                        <div class="d-flex justify-content-between">
                            <select class="form-select form-select-sm w-50">
                                <option selected>Green</option>
                                <option>Silver</option>
                                <option>Space Gray</option>
                            </select>
                            <select class="form-select form-select-sm w-50 ms-2">
                                <option selected>Just the device</option>
                                <option>With AppleCare+</option>
                            </select>
                        </div>
            
                        <!-- Price & Button -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold fs-5">$549</span>
                            <button class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-cart-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg border-0 rounded-4 m-2" style="width: 20rem;">
                    <!-- Product Image -->
                    <div class="text-center mt-4">
                        <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/airpods-max-green-select-202011?wid=470&hei=556&fmt=png-alpha&.v=1604022365000" 
                            class="card-img-top w-75" alt="AirPods Max">
                    </div>
            
                    <!-- Card Body -->
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">AirPods Max</h5>
                        <p class="card-text text-muted">
                            A perfect balance of exhilarating high-fidelity audio and the effortless magic of AirPods.
                        </p>
            
                        <!-- Dropdowns -->
                        <div class="d-flex justify-content-between">
                            <select class="form-select form-select-sm w-50">
                                <option selected>Green</option>
                                <option>Silver</option>
                                <option>Space Gray</option>
                            </select>
                            <select class="form-select form-select-sm w-50 ms-2">
                                <option selected>Just the device</option>
                                <option>With AppleCare+</option>
                            </select>
                        </div>
            
                        <!-- Price & Button -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold fs-5">$549</span>
                            <button class="btn btn-success rounded-pill px-4">
                                <i class="bi bi-cart-plus"></i> Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

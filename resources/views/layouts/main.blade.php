<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SERAT KARTINI EDU ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logoserat.png') }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Maven Pro' rel='stylesheet'>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">


    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <style>
        body {
            font-family: 'Maven Pro';
        }

        @media (max-width: 1024px) {
            body {
                margin-bottom: 50px !important;
            }
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner-container {
            position: relative;
        }

        .spinner-border {
            width: 5rem;
            height: 5rem;
        }

        .spinner-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 3rem;
            height: 3rem;
        }
    </style>
</head>

<body>
    {{-- preload --}}
    <div id="preloader">
        <div class="spinner-container">
            <div class="spinner-border" role="status" style="color: #d73696 !important">
                <span class="sr-only">Loading...</span>
            </div>
            <img src="{{ asset('img/logoserat.png') }}" alt="Loading" class="spinner-image">
        </div>
    </div>
    {{-- preload --}}

    <!-- Navbar Start -->
    <nav class="navbar-top">
        <img src="{{ asset('img/logoseratcut.png') }}" alt="Logo" class="logo">
        <div class="nav-container">
            <div class="nav-links">
                <a href="/" class="{{ $active === 'beranda' ? 'active' : '' }}">BERANDA</a>

                @auth
                    <a href="/kelas" class="{{ $active === 'kelas' ? 'active' : '' }}">KELAS</a>
                @else
                    <a href="/konseling" class="{{ $active === 'konseling' ? 'active' : '' }}">KONSELING</a>
                @endauth

                <a class="dropdown-toggle {{ $active === 'informasi' ? 'active' : '' }}" href="#"
                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    PUSAT INFORMASI
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/artikel">Artikel</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/pelatihan">Pelatihan</a></li>
                    @auth
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/konseling">Konseling</a></li>
                    @endauth
                </ul>
            </div>

            @auth
                <a href="/profile/{{ Auth::user()->id }}"
                    class="{{ $active === 'profile' ? 'active' : '' }} login-button">
                    PROFILE
                </a>
            @else
                <a href="/login" class="{{ $active === 'login' ? 'active' : '' }} login-button">
                    <i class="fa fa-arrow-right"></i>
                    LOGIN
                </a>
            @endauth
        </div>
    </nav>

    <nav class="bottom-bar">
        {{-- Kondisi untuk menampilkan menu jika pengguna tidak login --}}
        @guest
            <a href="/" class="{{ $active === 'beranda' ? 'active' : '' }}">
                <i class="fa fa-home"></i>
                BERANDA
            </a>
            <a href="/konseling" class="{{ $active === 'konseling' ? 'active' : '' }}">
                <i class="fa fa-comments"></i>
                KONSELING
            </a>
            <a href="#" class="dropdown-toggle {{ $active === 'pusat_informasi' ? 'active' : '' }}" id="pusatInformasiDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-info-circle"></i>
                PUSAT INFORMASI
            </a>
            <ul class="dropdown-menu" aria-labelledby="pusatInformasiDropdown">
                <li><a class="dropdown-item" href="/artikel">Artikel</a></li>
                <li><a class="dropdown-item" href="/pelatihan">Pelatihan</a></li>
            </ul>
            {{-- Tombol login saat tidak login --}}
            <a href="/login" class="{{ $active === 'login' ? 'active' : '' }}">
                <i class="fa fa-right-to-bracket"></i>
                LOGIN
            </a>
        @endguest
    
        {{-- Kondisi untuk menampilkan menu jika pengguna sudah login --}}
        @auth
            <a href="/" class="{{ $active === 'beranda' ? 'active' : '' }}">
                <i class="fa fa-home"></i>
                BERANDA
            </a>
            <a href="/kelas" class="{{ $active === 'kelas' ? 'active' : '' }}">
                <i class="fa fa-chalkboard-user"></i>
                KELAS
            </a>
            <a href="#" class="dropdown-toggle {{ $active === 'pusat_informasi' ? 'active' : '' }}" id="pusatInformasiDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-info-circle"></i>
                PUSAT INFORMASI
            </a>
            <ul class="dropdown-menu" aria-labelledby="pusatInformasiDropdown">
                <li><a class="dropdown-item" href="/artikel">Artikel</a></li>
                <li><a class="dropdown-item" href="/pelatihan">Pelatihan</a></li>
                <li><a class="dropdown-item" href="/konseling">Konseling</a></li>
            </ul>
            {{-- Tombol profile saat sudah login --}}
            <a href="/profile/{{ Auth::user()->id }}" class="{{ $active === 'profile' ? 'active' : '' }}">
                <i class="fa fa-solid fa-user"></i>
                PROFILE
            </a>
        @endauth
    </nav>
    
    
    <!-- Navbar End -->

    {{-- content --}}
    <div class="floating-buttons">
        <!-- WhatsApp Button -->
        <a href="https://wa.me/6281234567890" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="30px" />
        </a>
        <!-- Download Button -->
        <a href="https://drive.usercontent.google.com/u/0/uc?id=13fX6Uma3EEN3c2HRHwNSQAAyLh1dxYP1&export=download" class="download" download>
            <i class="bi bi-download"></i>
        </a>
    </div>
    @yield('konten')

    {{-- end content --}}
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <!-- Left Section (DP3AP2KB, Udinus, HMTI, Contact Info) -->
                <div class="col-md-3 mb-2">
                    <div class="footer-logo mb-3">
                        <img src="{{ asset('img/dp3ap2kb.png') }}" alt="DP3AP2KB Logo" class="dp3ap2kb-logo" style="width: 150px;">
                    </div>
                    <!-- Contact Information -->
                    <p class="mb-1"><strong>Serat Kartini</strong></p>
                    <p><i class="bi bi-telephone"></i> 024-7602952</p>
                    <p><i class="bi bi-geo-alt"></i> Jl. Pamularsih No. 28 Semarang 50148</p>
                    <p><i class="bi bi-fax"></i> Fax: 024-7622536</p>
                    <a href="https://dp3akb.jatengprov.go.id/" class="btn btn-outline-light btn-sm">GET IN TOUCH</a>
                </div>
                <div class="col-md-1 d-none d-md-block">
                    <div class="vertical-separator"></div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="footer-logo serat-logo mb-3">
                        <img src="{{ asset('img/LogoUdinus.png') }}" alt="Udinus Logo" class="udinushmti-logo" style="width: 80px; margin-right: 10px;">
                        <img src="{{ asset('img/Logo_HMTI.png') }}" alt="HMTI Logo" class="udinushmti-logo" style="width: 80px;">
                    </div>
                    <!-- Contact Information -->
                    <p class="mb-1"><strong>HMTI UDINUS</strong></p>
                    <p><i class="bi bi-instagram"></i> <a href="https://www.instagram.com/hmtiudinus/">@hmtiudinus</a></p>
                    <p><i class="bi bi-geo-alt"></i> Gedung D Lantai 1 Universitas Dian Nuswantoro. Jl. Nakula 1 No. 5-11 Semarang, Semarang, Indonesia 50131</p>
                    <a href="https://hmtiudinus.org" class="btn btn-outline-light btn-sm">GET IN TOUCH</a>
                </div>
                <div class="col-md-1 d-none d-md-block">
                    <div class="vertical-separator"></div>
                </div>
                <!-- Map Section -->
                <div class="col-md-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126724.97405814877!2d110.2453852972656!3d-6.990965699999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b3a56c22001%3A0x9cd061e4d8c6997d!2sDinas%20Pemberdayaan%20Perempuan%20Perlindungan%20Anak%20Pengendalian%20Penduduk%20Dan%20Keluarga%20Berencana%20(DP3AKB)!5e0!3m2!1sid!2sid!4v1728136666906!5m2!1sid!2sid"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
    
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <p class="mb-0">Copyright © Dinas Perempuan dan Anak Provinsi Jawa Tengah</p>
                    <a href="https://www.instagram.com/hmtiudinus/" style="text-decoration: none; color: white">
                        <p class="mb-0">© 2024 Supported by <span style="color: #219c90;">HMTI UDINUS</span></p>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <!-- Template Javascript -->

    <script>
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

</body>

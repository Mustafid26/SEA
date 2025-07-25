<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>SERAT KARTINI | Sekolah Perempuan Cerdas Masa Kini</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="keywords"
        content="pemberdayaan perempuan, sekolah perempuan, program perempuan, edukasi ibu, sekolah ibu, kesehatan anak, kesehatan ibu, ekonomi digital, perlindungan diri, industri sampah, gizi pangan, seratkartini">
    <meta name="description"
        content="Sekolah Perempuan Cerdas Masa Kini (SERAT KARTINI) merupakan model pemberdayaan perempuan akar rumput yang bertujuan mengembangkan kapasitas perempuan melalui peningkatan kesadaran dan pemikiran kritis, kecakapan hidup, solidaritas dan pembelajaran sepanjang hayat.">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logoseratcut.webp') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
            color: #fff;
            z-index: 99999;
            background-color: rgb(255, 255, 255);
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

    @livewireStyles
</head>

<body>
    <div id="preloader">
        <div class="spinner-container">
            <div class="spinner-border" role="status" style="color: #d73696 !important">
                <span class="visually-hidden">Loading...</span>
            </div>
            <img src="{{ asset('img/logoseratcut.webp') }}" alt="Loading" class="spinner-image">
        </div>
    </div>

    @include('layouts.partials.navbar-top')

    @include('layouts.partials.bottom-bar')

    @include('layouts.partials.float-button')

    <main>
        @yield('konten')
    </main>

    @include('layouts.partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <script>
        // Preloader script
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });

        // Navbar dropdown icon toggle script
        document.addEventListener("DOMContentLoaded", function() {
            // Script untuk navbar atas
            let dropdownTop = document.getElementById("navbarDropdown");
            if (dropdownTop) {
                let iconTop = document.getElementById("dropdownIcon");
                dropdownTop.addEventListener("click", function() {
                    let isExpanded = dropdownTop.getAttribute("aria-expanded") === "true";
                    iconTop.classList.toggle("bi-chevron-down", isExpanded);
                    iconTop.classList.toggle("bi-chevron-up", !isExpanded);
                });
            }
        });
    </script>

    @stack('scripts')

    @livewireScripts
</body>

</html>

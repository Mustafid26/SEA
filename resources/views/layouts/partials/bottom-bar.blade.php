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
        <a href="#" class="dropdown-toggle {{ $active === 'pusat_informasi' ? 'active' : '' }}"
            id="pusatInformasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-info-circle"></i>
            INFORMASI
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
        <a href="#" class="dropdown-toggle {{ $active === 'pusat_informasi' ? 'active' : '' }}"
            id="pusatInformasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-info-circle"></i>
            INFORMASI
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

 <nav class="navbar-top">
     <img src="{{ asset('img/logoseratcut.webp') }}" alt="Logo" class="logo">
     <div class="nav-container">
         <div class="nav-links">
             <a href="/" class="{{ $active === 'beranda' ? 'active' : '' }}">BERANDA</a>

             @auth
                 <a href="/kelas" class="{{ $active === 'kelas' ? 'active' : '' }}">KELAS</a>
             @else
                 <a href="/konseling" class="{{ $active === 'konseling' ? 'active' : '' }}">KONSELING</a>
             @endauth

             <a class="{{ $active === 'informasi' ? 'active' : '' }}" href="#" id="navbarDropdown" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                 INFORMASI
                 <i id="dropdownIcon" class="bi bi-chevron-down"></i>
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <li><a class="link dropdown-item" href="/artikel">Artikel</a></li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li><a class="link dropdown-item" href="/pelatihan">Pelatihan</a></li>
                 @auth
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li><a class="link dropdown-item" href="/konseling">Konseling</a></li>
                 @endauth
             </ul>
         </div>

         @auth
             <a href="/profile/{{ Auth::user()->id }}" class="{{ $active === 'profile' ? 'active' : '' }} login-button">
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

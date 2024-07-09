<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" style="text-decoration: none; color: white;" href="/redirect">SEA</a>
        <a class="sidebar-brand brand-logo-mini" href="/redirect"><img style="width: 50px; height: auto;"
                src="{{ asset('admin/assets/images/SEA.png') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/redirect') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-A" aria-expanded="false" aria-controls="ui-basic-A">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Artikel</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-A">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/view_artikel') }}">Add Artikel</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/show_artikel') }}">Show Artikel</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-B" aria-expanded="false"
                aria-controls="ui-basic-B">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-B">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/view_user') }}">Add User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/show_user') }}">Show User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/nilai_user') }}">Nilai Pretest User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/nilai_postest_user') }}">Nilai Postest User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/pretest_user') }}">Pretest User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/postest_user') }}">Postest User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/view_foto') }}">Add Foto Beranda</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/show_foto') }}">Show Foto Beranda</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-C" aria-expanded="false"
                aria-controls="ui-basic-C">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Kelas</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-C">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('view_kelas') }}">Add Kelas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('show_kelas') }}">Show Kelas</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-D" aria-expanded="false"
                aria-controls="ui-basic-D">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Materi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-D">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('view_materi') }}">Add Materi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('show_materi') }}">Show Materi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('show_konten') }}">Show Konten</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" data-toggle="collapse" href="/logout" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                aria-controls="ui-basic-D">
                <span class="menu-icon">
                    <i class="mdi mdi-logout text-danger"></i>
                </span>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>

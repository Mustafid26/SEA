<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="/redirect">
            <img src="{{ asset('admin/assets/images/SEA.webp') }}" alt="logo" style="width: 50px; height: auto;" />
        </a>
    </div>

    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right ml-auto w-100">
            @if (Request::is('redirect'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        <input type="text" name="search_dashboard" class="form-control" placeholder="Search">
                    </form>
                </li>
            @elseif(Request::is('show_artikel'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ 'search_artikel' }}"
                        method="GET">
                        @csrf
                        <input style="color:white;" type="text" name="search_user" class="form-control"
                            placeholder="Search user">
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>
                </li>
            @elseif(Request::is('show_user'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ 'search_user' }}"
                        method="GET">
                        @csrf
                        <input style="color:white;" type="text" name="search_user" class="form-control"
                            placeholder="Search user">
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>
                </li>
            @elseif(Request::is('show_kelas'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ 'search_kelas' }}"
                        method="GET">
                        @csrf
                        <input style="color:white;" type="text" name="search_kelas" class="form-control"
                            placeholder="Search kelas">
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>
                </li>
            @elseif(Request::is('show_materi'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ 'search_materi' }}"
                        method="GET">
                        @csrf
                        <input style="color:white;" type="text" name="search_kelas" class="form-control"
                            placeholder="Search Materi">
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>
                </li>
            @elseif(Request::is('show_konten'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ 'search_konten' }}"
                        method="GET">
                        @csrf
                        <input style="color:white;" type="text" name="search_konten" class="form-control"
                            placeholder="Search Konten">
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>
                </li>
            @elseif(Request::is('show_pretest'))
                <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{ 'search_pretest' }}"
                        method="GET">
                        @csrf
                        <input style="color:white;" type="text" name="search_pretest" class="form-control"
                            placeholder="Search Soal">
                        <input type="submit" value="Search" class="btn btn-danger">
                    </form>
                </li>
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Profile</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="/user/profile">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="/logout" class="dropdown-item preview-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Log out</p>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing" style="color: white;"></span>
    </button>
</nav>

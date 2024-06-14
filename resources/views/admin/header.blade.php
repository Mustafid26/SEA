<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="/redirect"><img src="{{asset('admin/assets/images/SEA.png')}}"
                style="width: 50px; height: auto;" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        @if(Request::is('redirect'))
        <ul class="navbar-nav w-100 navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user()->name}}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                        <a class="dropdown-item preview-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-logout text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Log out</p>
                        </div>
                        </a>
                    </form>
              </li>
        </ul>
        {{-- @elseif(Request::is('order'))
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{'search_order'}}" method="GET">
                    @csrf
                    <input style="color:white;" type="text" name="search_order" class="form-control"
                        placeholder="Search order">
                    <input type="submit" value="Search" class="btn btn-danger">
                </form>
            </li>
        </ul> --}}
        @elseif(Request::is('show_user'))
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{'search_user'}}" method="GET">
                    @csrf
                    <input style="color:white;" type="text" name="search_user" class="form-control"
                        placeholder="Search user">
                    <input type="submit" value="Search" class="btn btn-danger">
                </form>
            </li>
        </ul>
        @endif
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>

    </div>
</nav>

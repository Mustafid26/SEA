<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="#"><img src="admin/assets/images/dapoerfda12.png"
                style="width: 50px; height: auto;" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        @if(Request::is('redirect'))
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text" name="search_dashboard" class="form-control" placeholder="Search">
                </form>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="myButton" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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


    </div>
</nav>

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Zie Resto App</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('/') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('/') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('jenis') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('jenis') }}">
                    <div class="text-white  text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class=" nav-link-text ms-1">Jenis</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white {{ Request::is('menu') ? 'active bg-gradient-primary' : '' }}"
                    href="{{ url('menu') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">menu_book</i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('pelanggan') ? 'active bg-gradient-primary' : '' }}" href="{{ url('pelanggan') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">account_box</i>
                    </div>
                    <span class="nav-link-text ms-1">Pelanggan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/rtl.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shopping_cart</i>
                    </div>
                    <span class="nav-link-text ms-1">Transaksi</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Admin pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">account_circle</i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
            <a class="btn btn-outline-primary mt-4 w-100 "
                href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree"
                type="button"> LOG OUT</a>
        </div>
    </div>
</aside>
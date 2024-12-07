<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">

        <a style="padding-left: 20px; padding-top: 10px" class=" align-items-center d-flex m-0 "
            href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Eduventory" width="80%">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class=" w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('user-profile') ? 'active' : '' }} " href="{{ url('user-profile') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>customer-support</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                            <path class="color-background"
                                                d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                id="Path" opacity="0.59858631"></path>
                                            <path class="color-foreground"
                                                d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                id="Path"></path>
                                            <path class="color-foreground"
                                                d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('barang') ? 'active' : '' }} " href="{{ url('barang') }}">
                    <div
                        class="icon icon-shap icon-sm shadow border-radius-md bg-white text-center me-1 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 16 16">
                            <path fill="none" stroke="black"
                                d="M8 13.5H3a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h5m0 6v-6m0 6h5a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5H8m2.5.5v2m-2-7v2m-3 3v2m-1-7v4.5h7V3a.5.5 0 0 0-.5-.5H5a.5.5 0 0 0-.5.5Z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Barang</span>
                </a>
            </li>
            @if (session('role') === 'user')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user.peminjaman') ? 'active' : '' }} "
                        href="{{ url('user/peminjaman') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 48 48">
                                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"
                                    d="M32.694 41.287H20.563c-1.82 0-3.336-1.516-3.336-3.336V24h-8.39C7.016 24 5.5 22.484 5.5 20.664s1.516-3.336 3.336-3.336h8.39v-7.279c0-1.82 1.517-3.336 3.337-3.336s3.336 1.516 3.336 3.336v7.279h8.795c5.661 0 9.806 5.054 9.806 12.03c0 6.874-4.044 11.929-9.806 11.929m-8.795-6.672h8.795c.607 0 1.314-.101 2.123-1.213c.708-1.011 1.01-2.528 1.01-4.145c0-2.123-.808-5.358-3.133-5.358h-8.795z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Barang Dipinjam</span>
                    </a>
                </li>
            @endif

            @if (session('role') === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('peminjaman') ? 'active' : '' }} " href="{{ url('peminjaman') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 48 48">
                                <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"
                                    d="M32.694 41.287H20.563c-1.82 0-3.336-1.516-3.336-3.336V24h-8.39C7.016 24 5.5 22.484 5.5 20.664s1.516-3.336 3.336-3.336h8.39v-7.279c0-1.82 1.517-3.336 3.337-3.336s3.336 1.516 3.336 3.336v7.279h8.795c5.661 0 9.806 5.054 9.806 12.03c0 6.874-4.044 11.929-9.806 11.929m-8.795-6.672h8.795c.607 0 1.314-.101 2.123-1.213c.708-1.011 1.01-2.528 1.01-4.145c0-2.123-.808-5.358-3.133-5.358h-8.795z" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Peminjaman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kategori') ? 'active' : '' }} " href="{{ url('kategori') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24">
                                <path fill="black"
                                    d="M6.5 11L12 2l5.5 9zm11 11q-1.875 0-3.187-1.312T13 17.5t1.313-3.187T17.5 13t3.188 1.313T22 17.5t-1.312 3.188T17.5 22M3 21.5v-8h8v8zM17.5 20q1.05 0 1.775-.725T20 17.5t-.725-1.775T17.5 15t-1.775.725T15 17.5t.725 1.775T17.5 20M5 19.5h4v-4H5zM10.05 9h3.9L12 5.85zm7.45 8.5" />
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Kategori</span>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ url('users') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" viewBox="0 0 24 24">
                                <g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" color="black">
                                    <path
                                        d="M2 2h14c1.886 0 2.828 0 3.414.586S20 4.114 20 6v6c0 1.886 0 2.828-.586 3.414S17.886 16 16 16H9m1-9.5h6M2 17v-4c0-.943 0-1.414.293-1.707S3.057 11 4 11h2m-4 6h4m-4 0v5m4-5v-6m0 6v5m0-11h6" />
                                    <path d="M6 6.5a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                </g>
                            </svg>
                            <!-- <i style="font-size: 1rem;"
                                class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ Request::is('user-management') ? 'text-white' : 'text-dark' }} "
                                aria-hidden="true"></i> -->
                        </div>
                        <span class="nav-link-text ms-1">Guru</span>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Request::is('peminjaman.showListLaporan') ? 'active' : '' }}"
                        href="{{ url('/peminjaman/laporan') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" color="black">
                                    <path
                                        d="M2 2h14c1.886 0 2.828 0 3.414.586S20 4.114 20 6v6c0 1.886 0 2.828-.586 3.414S17.886 16 16 16H9m1-9.5h6M2 17v-4c0-.943 0-1.414.293-1.707S3.057 11 4 11h2m-4 6h4m-4 0v5m4-5v-6m0 6v5m0-11h6" />
                                    <path d="M6 6.5a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                </g>
                            </svg>
                            <!-- <i style="font-size: 1rem;"
                                class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ Request::is('user-management') ? 'text-white' : 'text-dark' }} "
                                aria-hidden="true"></i> -->
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li>
            @endif



        </ul>
    </div>

</aside>

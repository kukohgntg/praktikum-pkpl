<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP | @yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.min.css">

    {{-- Select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

</head>

<body>
    {{-- Navbar utama yang mencakup logo dan tombol menu --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
        <div class="container-fluid">
            {{-- Menampilkan logo dan offcanvas menu hanya jika pengguna sudah login --}}
            @if (Auth::check())
                <a class="navbar-brand d-flex align-items-center col-6 col-sm-4 col-md-3 col-lg-2"
                    data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <img src="{{ asset('./images/logo.png') }}" alt="SIP Sistem Informasi Perpustakaan"
                        class="img-fluid" style="max-height: 50px;">
                </a>
            @else
                {{-- Jika pengguna belum login, tampilkan logo saja tanpa fitur offcanvas --}}
                <a class="navbar-brand col-6 col-sm-4 col-md-3 col-lg-2" href="/">
                    <img src="{{ asset('./images/logo.png') }}" alt="SIP Sistem Informasi Perpustakaan"
                        class="img-fluid" style="max-height: 50px;">
                </a>
            @endif

            {{-- Tombol toggle untuk menampilkan menu pada layar kecil (mobile) --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu navigasi collapsible yang berisi dropdown profil --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    {{-- Dropdown untuk ikon profil dan nama pengguna --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- Menampilkan ikon profil person-fill dari Bootstrap --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            {{-- Jika user sudah login, tampilkan nama pengguna --}}
                            @if (Auth::check())
                                {{ Auth::user()->username }}
                            @endif
                        </a>

                        {{-- Menu dropdown untuk opsi profil dan logout jika sudah login --}}
                        <ul class="dropdown-menu dropdown-menu-end rounded shadow">
                            @if (Auth::check())
                                <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/user/logout">Logout</a></li>
                            @else
                                {{-- Jika belum login, tampilkan opsi login dan register --}}
                                <li><a class="dropdown-item" href="/auth/login">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/auth/register">Register</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    {{-- Header yang akan diisi oleh konten halaman yang lain --}}
    <header>
        @yield('header')
    </header>

    <main>

        {{-- Sidebar menu offcanvas, hanya terlihat jika pengguna login --}}
        @if (Auth::user())
            <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">SIP Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                {{-- Menu navigasi utama dengan daftar group dan collapse --}}
                <div class="list-group list-group-flush">

                    {{-- Opsi menu hanya untuk admin --}}
                    @if (Auth::user()->role_id == 1)
                        {{-- Menu Dashboard --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('user/dashboard') ? 'active' : '' }}"
                            href="/user/dashboard">
                            <i class="bi bi-house-door me-2"></i> Dashboard
                        </a>

                        {{-- Menu collapse untuk Books dengan submenu --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3"
                            data-bs-toggle="collapse" href="#collapseBooks" role="button" aria-expanded="false"
                            aria-controls="collapseBooks">
                            <i class="bi bi-book me-2"></i> Books
                        </a>
                        <div class="collapse {{ request()->is('admin/books', 'admin/books/add', 'admin/books/edit/*', 'admin/books/delete/*', 'admin/books/deleted', 'admin/books/restore/*', 'admin/lend', 'admin/lend/return') ? 'show' : '' }}"
                            id="collapseBooks">
                            <div class="list-group list-group-flush">
                                {{-- Submenu Book List --}}
                                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/books', 'admin/books/add', 'admin/books/edit/*', 'admin/books/delete/*', 'admin/books/deleted', 'admin/books/restore/*') ? 'active' : '' }}"
                                    href="/admin/books">
                                    <i class="bi bi-sort-alpha-down me-2"></i> Book List
                                </a>
                                {{-- Submenu Book Lending --}}
                                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/lend') ? 'active' : '' }}"
                                    href="/admin/lend">
                                    <i class="bi bi-arrow-right-circle me-2"></i> Book Lending
                                </a>
                                {{-- Submenu Book Return --}}
                                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/lend/return') ? 'active' : '' }}"
                                    href="/admin/lend/return">
                                    <i class="bi bi-arrow-left-circle me-2"></i> Book Return
                                </a>
                            </div>
                        </div>

                        {{-- Menu Categories --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/categories', 'admin/categories/add', 'admin/categories/edit/*', 'admin/categories/delete/*', 'admin/categories/deleted', 'admin/categories/restore/*') ? 'active' : '' }}"
                            href="/admin/categories">
                            <i class="bi bi-tags me-2"></i> Categories
                        </a>

                        {{-- Menu Loan Records --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/lend/records') ? 'active' : '' }}"
                            href="/admin/lend/records">
                            <i class="bi bi-file-earmark-text me-2"></i> Loan Records
                        </a>

                        {{-- Menu User Management --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/users', 'admin/users/inactive', 'admin/users/banned', 'admin/users', 'admin/users/detail/*', 'admin/users/ban/*', 'admin/users/unban/*') ? 'active' : '' }}"
                            href="/admin/users">
                            <i class="bi bi-person-gear me-2"></i> User Management
                        </a>

                        {{-- Menu collapse untuk Users dengan submenu
                        <a class="list-group-item list-group-item-action list-group-item-light p-3"
                            data-bs-toggle="collapse" href="#collapseUsers" role="button" aria-expanded="false"
                            aria-controls="collapseUsers">
                            <i class="bi bi-person me-2"></i> Users
                        </a>
                        <div class="collapse {{ request()->is('admin/users', 'admin/users/inactive', 'admin/users/banned') ? 'show' : '' }}"
                            id="collapseUsers">
                            <div class="list-group list-group-flush">
                                Submenu User List
                                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/users') ? 'active' : '' }}"
                                    href="/admin/users">
                                    <i class="bi bi-people me-2"></i> User List
                                </a>
                                Submenu Inactive User List
                                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/users/inactive') ? 'active' : '' }}"
                                    href="/admin/users/inactive">
                                    <i class="bi bi-person-lock me-2"></i> Inactive User List
                                </a>
                                Submenu Banned Users List
                                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('admin/users/banned') ? 'active' : '' }}"
                                    href="/admin/users/banned">
                                    <i class="bi bi-person-slash me-2"></i> Banned Users List
                                </a>
                            </div>
                        </div> --}}

                        {{-- Menu Logout --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('user/logout') ? 'active' : '' }}"
                            href="/user/logout">
                            <i class="bi bi-door-open me-2"></i> Logout
                        </a>
                    @else
                        {{-- Jika bukan admin, tampilkan opsi Book List dan Profile --}}
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('/') ? 'active' : '' }}"
                            href="/">
                            <i class="bi bi-book me-2"></i> Book List
                        </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('user/profile') ? 'active' : '' }}"
                            href="/user/profile">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('user/logout') ? 'active' : '' }}"
                            href="/user/logout">
                            <i class="bi bi-door-open me-2"></i> Logout
                        </a>
                    @endif
                </div>
            </div>
        @endif

        {{-- Konten halaman yang dinamis sesuai dengan halaman yang sedang diakses --}}
        <div class="p-5 mt-5">
            @yield('content')
        </div>


    </main>


    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#dataTables').DataTable();
    </script>

    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.form-select-single').select2({
            theme: "bootstrap-5",
        });
        $('.form-select-multiple').select2({
            theme: "bootstrap-5",
        });
    </script>

    {{-- Vercel Web Analytics --}}
    <script>
        window.va = window.va || function() {
            (window.vaq = window.vaq || []).push(arguments);
        };
    </script>
    <script defer src="/_vercel/insights/script.js"></script>

    {{-- Vercel Speed Insights --}}
    <script>
        window.si = window.si || function() {
            (window.siq = window.siq || []).push(arguments);
        };
    </script>
    <script defer src="/_vercel/speed-insights/script.js"></script>
</body>

</html>

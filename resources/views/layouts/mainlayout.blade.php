<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- simple-datatables --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
        <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
            <div class="container-fluid">
                <!-- Pemicu Offcanvas -->
                <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                    aria-controls="offcanvasExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                      </svg>
                    Perpustakaan
                </a>

                <!-- Toggle Button for Mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible Navbar Content -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto"> <!-- ms-auto digunakan untuk memposisikan ke kanan -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <!-- Menampilkan icon person SVG untuk semua kondisi -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <!-- Jika user sudah login, tampilkan nama pengguna di samping ikon -->
                                @if (Auth::check())
                                    {{ Auth::user()->role_id != '1' && '2' }}
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @if (Auth::check())
                                    <!-- Jika user sudah login -->
                                    <!-- Opsi untuk Profile -->
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <!-- Opsi untuk Logout -->
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                @else
                                    <!-- Jika user belum login, tampilkan Login dan Register -->
                                    <li><a class="dropdown-item" href="/login">Login</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/register">Register</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>


            </div>
        </nav>


    <main>

        @if (Auth::user())
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                {{-- {{ request()->route()->uri() }} --}}

                <div class="list-group list-group-flush">

                    @if (Auth::user()->role_id == 1)
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('dashboard') ? 'active' : '' }}"
                            href="dashboard">
                            Dashboard
                        </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('books') ? 'active' : '' }}"
                            href="books">
                            Books
                        </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('categories/*', 'add-category', 'edit-category/*', 'delete-category/*', 'deleted-categories', 'restore-category/*') ? 'active' : '' }}"
                            href="categories">
                            Categories
                        </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('rentlogs') ? 'active' : '' }}"
                            href="rentlogs">
                            Rent Logs
                        </a>

                        <!-- Collapse Dropdown List Item -->
                        <a class="list-group-item list-group-item-action list-group-item-light p-3"
                            data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            Users
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                    href="users">
                                    User List
                                </a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                    href="inactive-users">
                                    Inactive User List
                                </a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                                    href="banned-users">
                                    Banned Users List
                                </a>
                            </div>
                        </div>

                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('logout') ? 'active' : '' }}"
                            href="logout">
                            Logout
                        </a>
                    @else
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('/') ? 'active' : '' }}"
                            href="/">
                            Book List
                        </a>

                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('profile') ? 'active' : '' }}"
                            href="profile">
                            Profile
                        </a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('logout') ? 'active' : '' }}"
                            href="logout">
                            Logout
                        </a>
                    @endif


                </div>
            </div>
        @endif


        <div class="p-5 mt-5"> <!-- Tambahkan mt-5 untuk memberi jarak di atas -->
            @yield('content')
        </div>
    </main>


    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- jQuery-Core --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- simple-datatables --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('/js/datatables-simple-demo.js') }}"></script>
    {{-- vercel-speed-insights --}}
    <script>
        window.si = window.si || function() {
            (window.siq = window.siq || []).push(arguments);
        };
    </script>
    <script defer src="/_vercel/speed-insights/script.js"></script>
</body>

</html>

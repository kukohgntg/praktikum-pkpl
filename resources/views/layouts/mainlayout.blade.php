<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan | @yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- simple-datatables --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    {{-- If error turn on this --}}
    {{-- Or for RTL support --}}
    {{-- <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" /> --}}

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <!-- Pemicu Offcanvas (hanya ditampilkan jika pengguna sudah login) -->
            @if (Auth::check())
            <a class="navbar-brand d-flex align-items-center" data-bs-toggle="offcanvas" href="#offcanvasExample"
                role="button" aria-controls="offcanvasExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-caret-right-fill me-2" viewBox="0 0 16 16">
                    <path
                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg>
                Perpustakaan
            </a>
            @else
            <!-- Jika pengguna belum login, hanya tampilkan teks tanpa ikon -->
            <a class="navbar-brand" href="#">
                Perpustakaan
            </a>
            @endif

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Menampilkan icon person SVG untuk semua kondisi -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            <!-- Jika user sudah login, tampilkan nama pengguna di samping ikon -->
                            @if (Auth::check())
                            {{ Auth::user()->username }} <!-- Tampilkan nama user setelah login -->
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end rounded">
                            @if (Auth::check())
                            <!-- Jika user sudah login -->
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('lend-book') ? 'active' : '' }}"
                    href="lend-book">
                    Lend books
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

    {{-- vercel-speed-insights --}}
    <script>
        window.si = window.si || function() {
            (window.siq = window.siq || []).push(arguments);
        };
    </script>
    <script defer src="/_vercel/speed-insights/script.js"></script>

    {{-- jQuery-Core --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- simple-datatables --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/datatables-simple-demo.js') }}"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Basic
        $("select").select2({
            theme: "bootstrap-5",
        });

        // Small using Select2 properties
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--small", // For Select2 v4.0
            selectionCssClass: "select2--small", // For Select2 v4.1
            dropdownCssClass: "select2--small",
        });

        // Small using Bootstrap 5 classes
        $("#form-select-sm").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#form-select-sm").parent(), // Required for dropdown styling
        });

        // Large using Select2 properties
        $("#form-select-lg").select2({
            theme: "bootstrap-5",
            containerCssClass: "select2--large", // For Select2 v4.0
            selectionCssClass: "select2--large", // For Select2 v4.1
            dropdownCssClass: "select2--large",
        });

        // Large using Bootstrap 5 classes
        $("#form-select-lg").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#form-select-lg").parent(), // Required for dropdown styling
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- Pemicu Offcanvas -->
                <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                    aria-controls="offcanvasExample">
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
                                Dropdown
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main>
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('categories') ? 'active' : '' }}"
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
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                                Action
                            </a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                                Another action
                            </a>
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">
                                Something else here
                            </a>
                        </div>
                    </div>

                    <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ request()->is('logout') ? 'active' : '' }}"
                        href="logout">
                        Logout
                    </a>
                @else
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

        <div class="p-5">
            @yield('content')
        </div>
    </main>


    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

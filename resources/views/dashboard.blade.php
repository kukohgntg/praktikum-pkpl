@extends('layouts.mainlayout')

@section('title', 'Dashboard')


@section('content')
    <h1>Welcome, {{ Auth::user()->username }}</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        <!-- Menambahkan responsif row-cols-md dan row-cols-lg -->
        <div class="col">
            <div class="card h-100"> <!-- Menambahkan kelas h-100 agar tinggi card seragam -->
                <div class="row g-0 p-3"> <!-- Mengurangi padding agar lebih responsif di layar kecil -->
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <!-- Menambahkan Flexbox utilities -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-book" viewBox="0 0 16 16">
                            <path
                                d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h1 class="card-title">Books</h1>
                            <h5 class="card-text">{{ $book_count }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100"> <!-- Menambahkan kelas h-100 agar tinggi card seragam -->
                <div class="row g-0 p-3"> <!-- Mengurangi padding agar lebih responsif di layar kecil -->
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <!-- Menambahkan Flexbox utilities -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-list-task" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z" />
                            <path
                                d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z" />
                            <path fill-rule="evenodd"
                                d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z" />
                        </svg>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h1 class="card-title">Category</h1>
                            <h5 class="card-text">{{ $category_count }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100"> <!-- Menambahkan kelas h-100 agar tinggi card seragam -->
                <div class="row g-0 p-3"> <!-- Mengurangi padding agar lebih responsif di layar kecil -->
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <!-- Menambahkan Flexbox utilities -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                        </svg>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h1 class="card-title">Users</h1>
                            <h5 class="card-text">{{ $user_count }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

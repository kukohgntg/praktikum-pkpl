@extends('layouts.mainlayout')

@section('title', 'Library')

@section('content')

    <h1 class="text-center">Library Books</h1>

    <!-- Form Section -->
    <form action="" class="mt-5">
        <div class="row justify-content-center">
            <!-- Kategori Filter -->
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <div class="input-group">
                    <span class="input-group-text bg-primary text-white">
                        <i class="bi bi-filter"></i>
                    </span>
                    <select id="category" name="category" class="form-select form-select-single">
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="col-12 col-md-6">
                <div class="input-group">
                    <input id="title" name="title" type="text" class="form-control"
                        placeholder="Search Book's Title" aria-label="Search Book's Title">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Status Message -->
    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <!-- Books Section -->
    <section class="py-1">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($books as $item)
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                {{ $item->status }}
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top"
                                src="{{ $item != null ? asset('./storage/cover/' . $item->cover) : asset('./images/cover-not-available.png') }}"
                                alt="{{ $item->title }}" />
                            <!-- Product details-->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->title }}</h5>
                                    <!-- ISBN-->
                                    <h6 class="text-bold">ISBN:
                                        <span class="text-muted">
                                            {{ $item->book_code }}
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">Pinjam Buku</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

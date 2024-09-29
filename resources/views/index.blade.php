@extends('layouts.mainlayout')

@section('title', 'Library')


@section('content')
    {{-- {{ $categories }} --}}

    <h1>library Books</h1>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach ($books as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                {{ $item->status }}
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top"
                                src="{{ $item != null ? asset('./storage/cover/' . $item->cover) : asset('./images/cover-not-available.png') }}"
                                alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->title }}</h5>
                                    <!-- Product price-->
                                    <h6 class="text-bold">ISBN:
                                        <span class="text-muted ">
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
